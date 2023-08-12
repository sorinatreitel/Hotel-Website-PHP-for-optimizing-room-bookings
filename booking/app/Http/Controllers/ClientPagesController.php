<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use Illuminate\Http\Request;
use App\Models\Room;
use DB;
use Session;
use App\Models\User;
use App\Models\RoomType;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Testimonial;
use Mail;
use App\Http\Controllers\CustomAuthController;

class ClientPagesController extends Controller {

    public static $days = [1 => 31, 2 => 28, 3 => 31, 4 => 30, 5 => 31, 6 => 30, 7 => 31, 8 => 31, 9 => 30, 10 => 31, 11 => 30, 12 => 31];

    public function db_test() {
        return view('dbtest');
    }

    public function get_terms() {
        return view('auth.terms');
    }

    
    public function get_room($id) {
        $room = Room::find($id);
        return view('room')->with('room', $room);
    }

    public function get_checkout() {
        if(Session::has('room')) {
            if(Session::has('user')) {
                return view('checkout');
            }
            return redirect()->route('login');
        }
        return redirect()->route('home');
    }

    public function set_checkout_params(Request $request) {
        $room = Room::find($request->id);
        $price = $request->price;
        $days = $request->days;
        Session::put('room', $room);
        Session::put('final_price', $price);
        Session::put('days', $days);
        return response()->json(['success' => 'success'], 200);
    }

    public function get_search(Request $request) {
        $start = $request->check_in;
        $end = $request->check_out;
        $data = self::convert_date_frontend($start, $end);

        $priceReq = explode(';', $request->rangePrimary);

        $search = ['check_in' => $data['start'], 'check_out' => $data['end'], 'type' => $request->type, 'min_price' => $priceReq[0], 'max_price' => $priceReq[1]];

        if(self::validate_dates($data['start'], $data['end'])) {
            Session::put('search', $search);
            return view('search');
        }else {
            return redirect()->route('home');
        }
    }

    public static function validate_dates($start, $end) {
        if($start['year'] > $end['year']) {
            return false;
        }else if($start['year'] == $end['year']){
            if($start['month'] > $end['month']) {
                return false;
            }else if($start['month'] == $end['month']) {
                if($start['day'] >= $end['day']) {
                    return false;
                }else {
                    return true;
                }
            }else {
                return true;
            }
        }else {
            return true;
        }
    }

    public static function calc_days($start, $end) {
        $days = 0;

        if(self::validate_dates($start, $end)) {
            if($start['month'] == $end['month']) {
                $days += $end['day'] - $start['day'];
            }else {
                $days += self::$days[$start['month']] - $start['day'] + $end['day'];
            }
        }

        return $days;
    }

    public static function is_date_in($date, $start, $end) {
        if(($date['year'] >= $start['year'] && $date['year'] <= $end['year']) && ($date['month'] >= $start['month'] && $date['month'] <= $end['month']) && ($date['day'] >= $start['day'] && $date['day'] <= $end['day'])) {
            return true;
        }
        return false;
    }

    public static function convert_date_frontend($start, $end) {
        $data = explode('/', $start);
        $startFin = ['year' => intval($data[2]), 'month' => intval($data[0]), 'day' => intval($data[1])];

        $data = explode('/', $end);
        $endFin = ['year' => intval($data[2]), 'month' => intval($data[0]), 'day' => intval($data[1])];

        return ['start' => $startFin, 'end' => $endFin];
    }

    public static function convert_date($start, $end) {
        $data = explode('-', $start);
        $startFin = ['year' => intval($data[0]), 'month' => intval($data[1]), 'day' => intval($data[2])];

        $data = explode('-', $end);
        $endFin = ['year' => intval($data[0]), 'month' => intval($data[1]), 'day' => intval($data[2])];

        return ['start' => $startFin, 'end' => $endFin];
    }

    public static function get_facilities_for_room($room_id) {
        return DB::select('select * from AssociationFacility where id_Room = ' . $room_id);
    }

    public function save_client_data(Request $request) {
        if(Session::has('user')) {
            $userSess = Session::get('user');
            $userSess['name'] = $request->name;
            $userSess['email'] = $request->email;
            $userSess['phoneNumber'] = $request->phoneNumber;
            $userSess['username'] = $request->username;
            $user = User::find($userSess['id_User']);
            $user->update(['name' => $request->name, 'email' => $request->email, 'phoneNumber' => $request->phoneNumber, 'username' => $request->username]);

            Session::put('user', $userSess);

            return redirect()->back()->with('message', 'yes');
        }
        return redirect()->back();
    }

    public static function validate_room_from_search($id_room, $search) {
        $room = Room::find($id_room);
        $roomtype = RoomType::find($room->id_RoomType);
        $bookings = Booking::all();
        $okay = true;
        $search_res = Session::get('search');
        $start = $search_res['check_in'];
        $end = $search_res['check_out'];

        foreach($bookings as $booking) {
            if($booking->id_Room == $room->id_Room) {
                $dates = self::convert_date($booking->checkIn, $booking->checkOut);
                if(self::is_date_in($start, $dates['start'], $dates['end']) || self::is_date_in($end, $dates['start'], $dates['end'])) {
                    $okay = false;
                }
            }
        }


        if($room->id_RoomType == $search['type'] && $roomtype->price >= $search['min_price'] && $roomtype->price <= $search['max_price'] && $okay) {
            return true;
        }
        return false;
    }

    public function create_reservation(Request $request) {

        $payment = new Payment;
        $payment->typePayment = $request->paymentType;
        $payment->dateOfPay = date('Y-m-d');
        $payment->ammount = Session::get('final_price');
        $payment->save();

        $booking = new Booking;
        $booking->fullName = $request->fullName;
        $booking->checkIn = $request->checkIn;
        $booking->checkOut = $request->checkOut;
        $booking->status = "confirmed";
        $booking->roomsBooked = $request->roomNumber;
        $booking->numberAdults = $request->adults;
        $booking->numberChildren = $request->children;
        $booking->id_Room = $request->id_Room;
        $booking->id_User = $request->id_User;
        $booking->id_Payment = $payment->id_Payment;
        $booking->save();

        Session::put('adults', $request->adults);
        Session::put('children', $request->children);
        Session::put('full_name', $request->fullName);
        Session::put('res_email', $request->email);

        $booking_mail = $booking->toArray();

        Mail::to($request->email)->send(new MyEmail($booking_mail));

        return response()->json(['success' => 'success'], 200);
    }

    

    public function finalise_reservation() {
        $room = Session::get('room');
        $price = Session::get('final_price');
        $days = Session::get('days');
        $search_data = Session::get('search');
        $adults = Session::get('adults');
        $children = Session::get('children');
        $full_name = Session::get('full_name');
        $res_email = Session::get('res_email');

        Session::forget('room');
        Session::forget('final_price');
        Session::forget('days');
        Session::forget('search');
        Session::forget('adults');
        Session::forget('children');
        Session::forget('full_name');
        Session::forget('res_email');

        Session::flash('room', $room);
        Session::flash('final_price', $price);
        Session::flash('days', $days);
        Session::flash('search', $search_data);
        Session::flash('adults', $adults);
        Session::flash('children', $children);
        Session::flash('full_name', $full_name);
        Session::flash('res_email', $res_email);
        Session::flash('res-success', 'yes');

        return redirect()->back();
    }

    public function delete_account(Request $request) {
        if($request->accountActivation == 'on') {
            $user = User::find(Session::get('user')['id_User']);
            $user->delete();

            return redirect()->route('manual-logout');
        }else {
            return redirect()->back()->with('errmsg', 'no');
        }
    }

    public function save_testimonial(Request $request) {
  
        $user = Session::get('user');
        $testimonial = new Testimonial;
        $testimonial->id_User = $user['id_User'];
        $testimonial->rating = $request->star;
        $testimonial->id_RoomType = $request->type;
        $testimonial->content = $request->content;

        $testimonial->save();

        return redirect()->back();
    }

    public function change_prof_picture(Request $request) {
        $user = Session::get('user');

        $file = $request->file('profile_picture');
        $filename = $file->getClientOriginalName();
        $file->move("images/", $filename);

        $user->update(['profile' => $filename]);
        $user->profile = $filename;
        Session::put('user', $user);

        return redirect()->back();
    }

    public function get_pdf_page($id) {
        $booking = Booking::find($id);
        return view('pdf')->with('booking', $booking);
    }

    
}

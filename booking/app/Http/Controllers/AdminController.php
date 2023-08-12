<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use App\Models\Room;
use App\Models\RoomType;
use App\Models\SpecialDate;
use App\Models\Facility;
use App\Models\Booking;
use App\Models\Payment;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ClientPagesController;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('web');
        //$this->middleware('guest')->except('logout');
    }

    public function get_admin_dashboard() {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                return view('admin.main');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_users_page() {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                return view('admin.users');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_users_edit_page($id) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $user = User::find($id);
                return view('admin.singleuser')->with('user', $user);
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_rooms_page() {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                return view('admin.rooms');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_bookings_page() {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                return view('admin.bookings');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_packages_page() {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                return view('admin.facilities');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_specials_page() {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                return view('admin.special');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function edit_user(Request $request, $id) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $user = User::find($id);
                $user->update(['username' => $request->username, 'name' => $request->name, 'email' => $request->email, 'phoneNumber' => $request->phoneNumber, 'userType' => $request->userType]);
                return redirect()->back()->with('message', 'yes');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_room_edit_page($id) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $room = Room::find($id);
                return view('admin.singleroom')->with('room', $room);
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function edit_room(Request $request, $id) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $room = Room::find($id);
                if($request->check == 'ok') {
                    $room->update(['roomNumber' => $request->number, 'status' => $request->status, 'id_RoomType' => $request->type]);
                    return redirect()->back()->with('message', 'yes');
                }else {
                    $room->delete();
                    return redirect()->route('admin-rooms');
                }
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_new_room_page() {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                return view('admin.addroom');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function add_room(Request $request) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                if($request->type == 'no') {
                    return redirect()->back()->with('err', 'no');
                }else {
                    $file = $request->file('image');
                    $filename = $file->getClientOriginalName();
                    $file->move("images/", $filename);

                    $room = new Room;
                    $room->roomNumber = $request->roomNumber;
                    $room->id_RoomType = $request->type;
                    $room->status = "visible";
                    $room->image = $filename;
                    $room->save();

                    return redirect()->route('admin-rooms');
                }
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_roomtype_edit_page($id) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $roomtype = RoomType::find($id);
                return view('admin.singleroomtype')->with('roomtype', $roomtype);
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function edit_roomtype(Request $request, $id) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $roomtype = RoomType::find($id);
                if($request->check == 'ok') {
                    $roomtype->update(['type' => $request->type, 'description' => $request->description, 'price' => $request->price, 'capacity' => $request->capacity]);
                    return redirect()->back()->with('message', 'yes');
                }else {
                    $rms = DB::select('select * from Room where id_RoomType = ' . $roomtype->id_RoomType);
                    if(sizeof($rms) > 0) {
                        return redirect()->back()->with('roomtype_used', 'yes');
                    }else {
                        $roomtype->delete();
                        return redirect()->route('admin-rooms');
                    }
                }   
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_add_new_roomtype_page() {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                return view('admin.addroomtype');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function add_roomtype(Request $request) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $roomtype = new RoomType;
                $roomtype->type = $request->type;
                $roomtype->description = $request->description;
                $roomtype->price = $request->price;
                $roomtype->capacity = $request->capacity;
                $roomtype->save();
                return redirect()->route('admin-rooms');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_add_special_page() {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                return view('admin.addspecial');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function add_special(Request $request) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $data = explode('-', $request->dateStart);
                $start = ['year' => intval($data[0]), 'month' => intval($data[1]), 'day' => intval($data[2])];

                $data = explode('-', $request->dateEnd);
                $end = ['year' => intval($data[0]), 'month' => intval($data[1]), 'day' => intval($data[2])];

                //dd($start);
                if($request->type != 'no' && ClientPagesController::validate_dates($start, $end)) {
                    $special = new SpecialDate;
                    $special->dateStart = $request->dateStart;
                    $special->dateEnd = $request->dateEnd;
                    $special->price = $request->price;
                    $special->id_RoomType = $request->type;
                    $special->save();
                    return redirect()->route('admin-specials');
                }else {
                    return redirect()->back()->with('errMsg', 'no');
                }
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_edit_special_page($id) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $special = SpecialDate::find($id);
                return view('admin.singlespecial')->with('special', $special);
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function edit_special(Request $request, $id) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $special = SpecialDate::find($id);
                if($request->check == 'ok') {
                    $data = ClientPagesController::convert_date($request->dateStart, $request->dateEnd);
                    if(ClientPagesController::validate_dates($data['start'], $data['end'])) {
                        $special->update(['dateStart' => $request->dateStart, 'dateEnd' => $request->dateEnd, 'price' => $request->price, 'id_RoomType' => $request->type]);
                        return redirect()->back()->with('message', 'yes');
                    }
                    return redirect()->back()->with('errMsg', 'no');
                }else {
                    $special = SpecialDate::find($id);
                    $special->delete();
                    return redirect()->route('admin-specials');
                }
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function add_facility(Request $request) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $facility = new Facility;
                $facility->name = $request->name;
                $facility->save();
                return redirect()->back();
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function update_facility(Request $request, $id) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $facility = Facility::find($id);
                if($request->check == 'ok') {
                    $facility->update(['name' => $request->name]);
                    return redirect()->back();
                }else {
                    DB::delete("delete from AssociationFacility where id_Facility = " . $facility->id_Facility);
                    $facility->delete();
                    return redirect()->route('admin-facilities');
                }
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function add_facility_to_room(Request $request) {
        DB::insert('insert into AssociationFacility (id_Room, id_Facility) values (?, ?)', [$request->id_Room, $request->id_Facility]);
        return response()->json(['success' => 'success'], 200);
    }

    public function remove_facility_from_room(Request $request) {
        DB::delete('delete from AssociationFacility where id_Room = ? and id_Facility = ?', [$request->id_Room, $request->id_Facility]);
        return response()->json(['success' => 'success'], 200);
    }

    public static function check_room_has_facility($room, $facility) {
        $data = DB::select('select * from AssociationFacility where id_Room = ' . $room . ' and id_Facility = ' . $facility);

        if(sizeof($data) == 1) {
            return true;
        }
        return false;
    }

    public function get_edit_reservation_page($id) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $booking = Booking::find($id);
                return view('admin.singlereservation')->with('booking', $booking);
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function update_reservation(Request $request, $id) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $booking = Booking::find($id);
                $user = User::find($request->client);
                $room = Room::find($request->room);

                if($request->check == 'ok') {

                    $booking->update(['fullName' => $user->name, 'checkIn' => $request->checkIn, 'checkOut' => $request->checkOut, 'status' => $request->status, 'roomsBooked' => $room->roomNumber, 'numberAdults' => $request->adults, 'numberChildren' => $request->children, 'id_Room' => $room->id_Room, 'id_User' => $user->id_User]);
                    return redirect()->back()->with('message', 'yes');
                }else {
                    $booking->delete();
                    return redirect()->route('admin-bookings');
                }
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function get_add_reservation_page() {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                return view('admin.addreservation');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function add_reservation(Request $request) {
        if(Session::has('user')) {
            if(Session::get('user')['userType'] === 'admin') {
                $booking = new Booking;
                $user = User::find($request->client);
                $room = Room::find($request->room);

                $payment = new Payment;
                $payment->typePayment = $request->payment;
                $payment->dateOfPay = date('Y-m-d');
                $payment->ammount = $request->ammount;
                $payment->save();

                $booking->fullName = $user->name;
                $booking->checkIn = $request->checkIn;
                $booking->checkOut = $request->checkOut;
                $booking->status = "confirmed";
                $booking->roomsBooked = $room->roomNumber;
                $booking->numberAdults = $request->adults;
                $booking->numberChildren = $request->numberChildren;
                $booking->id_Room = $room->id_Room;
                $booking->id_User = $user->id_User;
                $booking->id_Payment = $payment->id_Payment;
                $booking->save();
                return redirect()->route('admin-bookings');
            }else{
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function downloadPDF($id)
    {
        $booking = Booking::find($id);

        $pdf = PDF::loadHTML(view("pdf")->with('booking', $booking));
        
        return $pdf->download("raport-" . $booking->id_Reservation . ".pdf");
    }

}
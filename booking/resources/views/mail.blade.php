
@php
    use App\Models\Room;
    use App\Models\RoomType;

    $room = Room::find($booking['id_Room']);
    $roomtype = RoomType::find($room->id_RoomType);
@endphp

<h1>Buna ziua {{$booking['fullName']}},</h1>

<h4>Acest mail a fost trimis automat pentru a confirma rezervarea cu id: {{$booking['id_Reservation']}}.</h4>

<p>Ati rezervat camera {{$booking['roomsBooked']}} de tipul {{$roomtype->type}}.</p>

<p>Va asteptam in data de {{explode(" ", $booking['checkIn'])[0]}} intre orele 07:00 si 12:00 pentru check-In</p>

<p>O zi frumoasa, </p>
<p>Echipa hotelului Perla Somesului</p>
@extends('admin.template')

@section('title', 'Editeaza Rezervarea')
@section('subtitle', "Gestioneaza rezervarile")

@section('content')

@php
    use App\Models\User;
    use App\Models\Room;
    use App\Models\Payment;

    $users = User::all();
    $rooms = Room::all();
    $payment = Payment::find($booking->id_Payment);
    //dd($booking);
@endphp

<form class='col-lg-4 col-sm-10 dri-form' method='post' action="{{route('admin-edit-reservation-post', ['id' => $booking->id_Reservation])}}">
    @csrf
    <div class="form-group row">
      <label for="staticID" class="col-sm-4 col-form-label">ID</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext" id="staticID" value="{{$booking->id_Reservation}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputType" class="col-sm-4 col-form-label">Client</label>
      <div class="col-sm-8">
        <select name="client" class="form-control">
            @foreach ($users as $user)
                <option value="{{$user->id_User}}" @if($booking->id_User == $user->id_User) selected @endif>{{$user->name}}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
        <label for="inputDesc" class="col-sm-4 col-form-label">Check In</label>
        <div class="col-sm-8">
          <input type="date" name='checkIn' class="form-control" id="inputDesc" value="{{explode(' ', $booking->checkIn)[0]}}">
        </div>
      </div>
    <div class="form-group row">
      <label for="inputPrice" class="col-sm-4 col-form-label">Check Out</label>
      <div class="col-sm-8">
        <input type="date" name='checkOut' class="form-control" id="inputPrice" value="{{explode(' ', $booking->checkOut)[0]}}">
      </div>
    </div>
    <div class="form-group row">
        <label for="inputCapacity" class="col-sm-4 col-form-label">Status</label>
        <div class="col-sm-8">
            <select name="status" class="form-control">
                <option value="confirmed" @if($booking->status == 'confirmed') selected @endif>Confirmed</option>
                <option value="cancelled" @if($booking->status == 'cancelled') selected @endif>Cancelled</option>
            </select>
        </div>
      </div>
    <div class="form-group row">
        <label for="inputCapacity" class="col-sm-4 col-form-label">Numar Adulti</label>
        <div class="col-sm-8">
            <input type="number" name='adults' class="form-control" id="inputcapacity" value="{{$booking->numberAdults}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputCapacity" class="col-sm-4 col-form-label">Numar Copii</label>
        <div class="col-sm-8">
            <input type="number" name='children' class="form-control" id="inputcapacity" value="{{$booking->numberChildren}}">
        </div>
    </div>
    <div class="form-group row">
        <label for="inputCapacity" class="col-sm-4 col-form-label">Camera</label>
        <div class="col-sm-8">
            <select name="room" class="form-control">
                @foreach ($rooms as $room)
                    <option value="{{$room->id_Room}}" @if($booking->id_Room == $room->id_Room) selected @endif>{{$room->roomNumber}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputCapacity" class="col-sm-4 col-form-label">Modalitate Plata</label>
        <div class="col-sm-8">
            <input type="text" name='typePayment' class="form-control-plaintext" id="inputcapacity" readonly value="{{$payment->typePayment}}">
        </div>
    </div>
    <div class="form-group row">
      <label for="inputCapacity" class="col-sm-4 col-form-label">suma Plata</label>
      <div class="col-sm-8">
          <input type="text" name='typePayment' class="form-control-plaintext" id="inputcapacity" readonly value="{{$payment->ammount}} Lei">
      </div>
    </div>
      <input type="hidden" id="check" name="check" value="ok">
    <button type='submit' class='btn' style='background-color: #4e73df;color:white;'>Salveaza</button>
    <button type='submit' id="del" class='btn btn-danger' style="margin-left: 15px">Sterge</button>
    @if(Session::get('message'))
    <p style='color: green; margin-top: 15px;'>Rezervarea a fost actualizata</p>
    @endif
  </form>

@endsection

@section('scripts')
<script>

$("#del").on('click', function () {
  document.getElementById('check').value = "delete";
});

</script>
@endsection
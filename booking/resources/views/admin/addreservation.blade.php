@extends('admin.template')

@section('title', 'Adauga Rezervare')
@section('subtitle', "Gestioneaza rezervarile")

@section('content')

@php
    use App\Models\User;
    use App\Models\Room;
    use App\Models\Payment;

    $users = User::all();
    $rooms = Room::all();
@endphp

<form class='col-lg-4 col-sm-10 dri-form' method='post' action="{{route('admin-add-reservation-post')}}">
    @csrf
    <div class="form-group row">
      <label for="inputType" class="col-sm-4 col-form-label">Client</label>
      <div class="col-sm-8">
        <select name="client" class="form-control">
            @foreach ($users as $user)
                <option value="{{$user->id_User}}">{{$user->name}}</option>
            @endforeach
            <option value="no" selected>Selecteaza</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
        <label for="inputDesc" class="col-sm-4 col-form-label">Check In</label>
        <div class="col-sm-8">
          <input type="date" name='checkIn' class="form-control" id="inputDesc" required>
        </div>
      </div>
    <div class="form-group row">
      <label for="inputPrice" class="col-sm-4 col-form-label">Check Out</label>
      <div class="col-sm-8">
        <input type="date" name='checkOut' class="form-control" id="inputPrice" required>
      </div>
    </div>
    <div class="form-group row">
        <label for="inputCapacity" class="col-sm-4 col-form-label">Numar Adulti</label>
        <div class="col-sm-8">
            <input type="number" name='adults' class="form-control" id="inputcapacity" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputCapacity" class="col-sm-4 col-form-label">Numar Copii</label>
        <div class="col-sm-8">
            <input type="number" name='children' class="form-control" id="inputcapacity" required>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputCapacity" class="col-sm-4 col-form-label">Camera</label>
        <div class="col-sm-8">
            <select name="room" class="form-control">
                @foreach ($rooms as $room)
                    <option value="{{$room->id_Room}}">{{$room->roomNumber}}</option>
                @endforeach
                <option value="no" selected>Selecteaza</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label for="inputCapacity" class="col-sm-4 col-form-label">Modalitate Plata</label>
        <div class="col-sm-8">
            <select class="form-control" name="payment">
                <option value="cash" selected>Cash</option>
                <option value="card">Card</option>
            </select>
        </div>
    </div>
    <div class="form-group row">
      <label for="inputCapacity" class="col-sm-4 col-form-label">Suma Plata</label>
      <div class="col-sm-8">
          <input type="number" class="form-control" name='ammount'>
      </div>
  </div>
      <input type="hidden" id="check" name="check" value="ok">
    <button type='submit' class='btn' style='background-color: #4e73df;color:white;'>Salveaza</button>
  </form>

@endsection
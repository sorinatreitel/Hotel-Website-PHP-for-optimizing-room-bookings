@extends('admin.template')

@section('title', 'Rezervari')
@section('subtitle', "Gestioneaza rezervarile")

@section('custom-style-div')

style="justify-content: flex-start!important"

@endsection

@section('content')

@php
    use App\Models\Payment;
    use App\Models\Booking;

    $bookings = Booking::all();
@endphp

<div class="row" style="margin-bottom: 300px">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Toate Rezervarile</h4>
        <div class="table-responsive">
          <table class="table table-striped" style="text-align:center">
            <thead>
              <tr>
                <th>
                  ID
                </th>
                <th>
                  Nume Complet
                </th>
                <th>
                  Check In
                </th>
                <th>
                  Check Out
                </th>
                <th>
                  Status
                </th>
                <th>
                  Camera
                </th>
                <th>
                  Modalitate plata
                </th>
                <th>
                  Suma
                </th>
                <th>
                  Actiuni
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($bookings as $booking)

              @php
                  $payment = Payment::find($booking->id_Payment);
              @endphp

              <tr>
                <td class="py-1">
                  {{$booking->id_Reservation}}
                </td>
                <td>
                  {{$booking->fullName}}
                </td>
                <td>
                  {{$booking->checkIn}}
                </td>
                <td>
                  {{$booking->checkOut}}
                </td>
                <td>
                  {{$booking->status}}
                </td>
                <td>
                  {{$booking->roomsBooked}}
                </td>
                <td>
                  {{$payment->typePayment}}
                </td>
                <td>
                  {{$payment->ammount}} Lei
                </td>
                <td>
                  <a href="{{route('admin-edit-reservation', ['id' => $booking->id_Reservation])}}"><button class="dri-btn">Edit</button></a>
                  <a href="{{route('admin-pdf-generation', ['id' => $booking->id_Reservation])}}"><button class="dri-btn">Genereaza PDF</button></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="{{route('admin-add-reservation')}}"><button class="btn btn-primary"  style='margin-top: 15px'>Adauga Rezervare</button></a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('scripts')
<script>

window.onload = function() {
if(document.getElementById('dashboard').classList.contains('active')) {
    document.getElementById('dashboard').classList.remove('active');
}

if(document.getElementById('users').classList.contains('active')) {
    document.getElementById('users').classList.remove('active');
}

if(document.getElementById('rooms').classList.contains('active')) {
    document.getElementById('rooms').classList.remove('active');
}

if(!document.getElementById('bookings').classList.contains('active')) {
    document.getElementById('bookings').classList.add('active');
}

if(document.getElementById('packages').classList.contains('active')) {
    document.getElementById('packages').classList.remove('active');
}

if(document.getElementById('special').classList.contains('active')) {
    document.getElementById('special').classList.remove('active');
}
}

</script>
@endsection
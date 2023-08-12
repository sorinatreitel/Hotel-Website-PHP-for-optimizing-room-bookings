@extends('admin.template')

@section('title', 'Camere')
@section('subtitle', "Gestioneaza camerele")

@section('content')

@php
    use App\Models\Room;
    use App\Models\RoomType;

    $rooms = Room::all();
@endphp

<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Toate camerele</h4>
        <div class="table-responsive">
          <table class="table table-striped" style="text-align: center">
            <thead>
              <tr>
                <th>
                  Numar
                </th>
                <th>
                  Tip
                </th>
                <th>
                  Status
                </th>
                <th>
                  Pret / Noapte
                </th>
                <th>
                  Actiuni
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($rooms as $room)

              @php
                  $roomtype = RoomType::find($room->id_RoomType);
              @endphp

              <tr>
                <td class="py-1">
                  {{$room->roomNumber}}
                </td>
                <td>
                  {{$roomtype->type}}
                </td>
                <td>
                  {{$room->status}}
                </td>
                <td>
                  {{$roomtype->price}} RON
                </td>
                <td>
                  <a href="{{route('admin-rooms-edit', ['id' => $room->id_Room])}}"><button class="dri-btn" >Edit</button></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="{{route('admin-add-room')}}"><button class="btn btn-primary"  style='margin-top: 15px'>Adauga Camera</button></a>
        </div>
      </div>
    </div>
  </div>
</div>

@php
    $roomtypes = RoomType::all();
@endphp

<div class="row">
  <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Tipuri de camere</h4>
          <div class="table-responsive">
            <table class="table table-striped" style="text-align: center">
              <thead>
                <tr>
                  <th>
                    Tip
                  </th>
                  <th>
                    Descriere
                  </th>
                  <th>
                    Pret / Noapte
                  </th>
                  <th>
                    Capacitate
                  </th>
                  <th>
                    Actiuni
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach($roomtypes as $roomtype)
  
                <tr>
                  <td class="py-1">
                    {{$roomtype->type}}
                  </td>
                  <td>
                    @if(strlen($roomtype->description) > 40)
                    {{substr($roomtype->description, 0, 40) . " ..."}}
                    @else 
                    {{$roomtype->description}}
                    @endif
                  </td>
                  <td>
                    {{$roomtype->price}} RON
                  </td>
                  <td>
                    {{$roomtype->capacity}}
                  </td>
                  <td>
                    <a href="{{route('admin-roomtype-edit', ['id' => $roomtype->id_RoomType])}}"><button class="dri-btn">Edit</button></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <a href="{{route('admin-add-roomtype')}}"><button class="btn btn-primary"  style='margin-top: 15px'>Adauga Tip de Camera</button></a>
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

if(!document.getElementById('rooms').classList.contains('active')) {
    document.getElementById('rooms').classList.add('active');
}

if(document.getElementById('bookings').classList.contains('active')) {
    document.getElementById('bookings').classList.remove('active');
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
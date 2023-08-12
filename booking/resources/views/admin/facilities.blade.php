@extends('admin.template')

@section('styles')
<link rel="stylesheet" href="{{asset('/css/core.css')}}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{asset('/css/theme-default.css')}}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{asset('/css/demo.css')}}" />
@endsection

@section('title', 'Facilitati')
@section('subtitle', "Gestioneaza facilitatile")

@section('custom-style-div')

style="justify-content: flex-start!important"

@endsection

@section('content')

@php
    use App\Models\Facility;

    $facilities = Facility::all();
@endphp

  <div class="col-md-6 col-lg-4" style="margin-bottom: 300px">
    <h6 class="mt-2 text-muted">Lista facilitati</h6>
    <div class="card mb-4">
      <ul class="list-group list-group-flush">
        @foreach ($facilities as $facility)
        <li class="list-group-item" style="cursor: pointer" onclick="open_fac('update_{{$facility->id_Facility}}')" id="fac_{{$facility->id_Facility}}"><span style="color: gray">ID: {{$facility->id_Facility}}</span> - {{$facility->name}}</li>

        <li class="list-group-item" style="text-align: center; display:none; padding-left: 5px" id="update_{{$facility->id_Facility}}">
          <form class="dri-form" method="post" action="{{route('admin-update-facility', ['id' => $facility->id_Facility])}}" style="margin-bottom: 10px;">
            @csrf
            <div class="form-group row">
              <label for="inputName" class="col-sm-4 col-form-label">Nume</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name='name' value="{{$facility->name}}" required>
              </div>
            </div>
            <input type="hidden" id="check_{{$facility->id_Facility}}" class="check" name="check" value="ok">
            <button type='submit' class='btn' style='background-color: #4e73df;color:white;'>Salveaza</button>
            <button type='submit' id="{{$facility->id_Facility}}" class='btn del' style='background-color: red; color:white;'>Sterge</button>
          </form>
        </li>

        @endforeach
        <li class="list-group-item" style="text-align: center; cursor: pointer;" id="add-facility"><i class="fa-solid fa-plus"></i></li>
        <li class="list-group-item" style="text-align: center; display:none; padding-left: 5px" id="add-hidden">
          <form class="dri-form" method="post" action="{{route('admin-add-facility')}}" style="margin-bottom: 10px;">
            @csrf
            <div class="form-group row">
              <label for="inputName" class="col-sm-4 col-form-label">Nume</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name='name' id="inputName" required>
              </div>
            </div>
            <button type='submit' class='btn' style='background-color: #4e73df;color:white;'>Salveaza</button>
          </form>
        </li>
      </ul>
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

if(document.getElementById('bookings').classList.contains('active')) {
    document.getElementById('bookings').classList.remove('active');
}

if(!document.getElementById('packages').classList.contains('active')) {
    document.getElementById('packages').classList.add('active');
}

if(document.getElementById('special').classList.contains('active')) {
    document.getElementById('special').classList.remove('active');
}
}

document.getElementById('add-facility').onclick = function () {
  if(document.getElementById('add-hidden').style.display == 'none') {
    document.getElementById('add-hidden').style.display = 'block';
  }else {
    document.getElementById('add-hidden').style.display = 'none';
  }
}

function open_fac(id) {
  if(document.getElementById(id).style.display == 'none') {
    document.getElementById(id).style.display = 'block';
  }else {
    document.getElementById(id).style.display = 'none';
  }
}

$(".del").on('click', function() {
  var id = $(this).attr('id');
  //alert(id);
  document.getElementById('check_' + id).value="delete";
});

</script>
@endsection
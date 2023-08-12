@extends('admin.template')

@section('title', 'Adauga Data Speciala')
@section('subtitle', "Gestioneaza datele speciale");

@section('content')

@php
    use App\Models\RoomType;
    $roomtypes = RoomType::all();
@endphp

<form class='col-lg-4 col-sm-10 dri-form' method='post' action="{{route('admin-add-special-post')}}">
    @csrf
    <div class="form-group row">
      <label for="inputType" class="col-sm-4 col-form-label">Data Start</label>
      <div class="col-sm-8">
        <input type="date" class="form-control" name='dateStart' id="inputType" required>
      </div>
    </div>
    <div class="form-group row">
        <label for="inputDesc" class="col-sm-4 col-form-label">Data Final</label>
        <div class="col-sm-8">
          <input type="date" name='dateEnd' class="form-control" id="inputDesc" required>
        </div>
      </div>
    <div class="form-group row">
      <label for="inputPrice" class="col-sm-4 col-form-label">Pret (RON)</label>
      <div class="col-sm-8">
        <input type="number" name='price' class="form-control" id="inputPrice" required>
      </div>
    </div>
    <div class="form-group row">
        <label for="inputCapacity" class="col-sm-4 col-form-label">Tip Camera</label>
        <div class="col-sm-8">
          <select class="form-control" name="type">
            @foreach ($roomtypes as $roomtype)
                <option value="{{$roomtype->id_RoomType}}">{{$roomtype->type}}</option>
            @endforeach
                <option value="no" selected>selecteaza</option>
          </select>
        </div>
      </div>
    <button type='submit' class='btn' style='background-color: #4e73df;color:white;'>Salveaza</button>
  </form>

@if(Session::has('errMsg'))
<p style="color: red">Eroare la validarea datelor</p>
@endif

@endsection
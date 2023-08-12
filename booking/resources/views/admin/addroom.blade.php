@extends('admin.template')

@section('title', 'Adauga Camera Noua')
@section('subtitle', "Gestioneaza camerele")

@section('content')

@php
    use App\Models\RoomType;

    $roomtypes = RoomType::all();
@endphp

<form class='col-lg-4 col-sm-10 dri-form' enctype="multipart/form-data" method='post' action="{{route('admin-add-room-post')}}">
    @csrf
    <div class="form-group row">
      <label for="inputType" class="col-sm-4 col-form-label">Numar Camera</label>
      <div class="col-sm-8">
        <input type="number" min="0" class="form-control" name='roomNumber' id="inputType" required>
      </div>
    </div>
    <div class="form-group row">
        <label for="inputDesc" class="col-sm-4 col-form-label">Tip Camera</label>
        <div class="col-sm-8">
          <select name="type" class="form-control">
            @foreach ($roomtypes as $roomtype)
                <option value="{{$roomtype->id_RoomType}}">{{$roomtype->type}}</option>
            @endforeach
                <option value="no" selected >Selecteaza</option>
          </select>
        </div>
      </div>
    <div class="form-group row">
      <label for="inputPrice" class="col-sm-4 col-form-label">Imagine</label>
      <div class="col-sm-8">
        <input type="file" name='image' class="form-control" id="inputImage" required>
      </div>
    </div>
    <button type='submit' class='btn' style='background-color: #4e73df;color:white;'>Salveaza</button>

    @if(Session::has('err'))
    <p style="color: red">Date gresit introduse sau lipsa</p>
    @endif
  </form>

@endsection
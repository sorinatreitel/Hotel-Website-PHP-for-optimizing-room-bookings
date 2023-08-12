@extends('admin.template')

@section('title', 'Editeaza Data')
@section('subtitle', "Gestioneaza camerele")

@section('content')

@php
    use App\Models\RoomType;

    $roomtypes = RoomType::all();
@endphp

<form class='col-lg-4 col-sm-10 dri-form' method='post' action="{{route('admin-edit-special-post', ['id' => $special->id_HistoryPrice])}}">
    @csrf
    <div class="form-group row">
      <label for="staticID" class="col-sm-4 col-form-label">ID</label>
      <div class="col-sm-8">
        <input type="id" readonly class="form-control-plaintext" id="staticID" value="{{$special->id_HistoryPrice}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputType" class="col-sm-4 col-form-label">Data Start</label>
      <div class="col-sm-8">
        <input type="date" class="form-control" name='dateStart' id="inputType" value="{{$special->dateStart}}">
      </div>
    </div>
    <div class="form-group row">
        <label for="inputDesc" class="col-sm-4 col-form-label">Data Final</label>
        <div class="col-sm-8">
          <input type="date" name='dateEnd' class="form-control" id="inputDesc" value="{{$special->dateEnd}}">
        </div>
      </div>
    <div class="form-group row">
      <label for="inputPrice" class="col-sm-4 col-form-label">Pret (RON)</label>
      <div class="col-sm-8">
        <input type="number" name='price' class="form-control" id="inputPrice" value="{{$special->price}}">
      </div>
    </div>
    <div class="form-group row">
        <label for="inputCapacity" class="col-sm-4 col-form-label">Tip Camera</label>
        <div class="col-sm-8">
          <select class="form-control" name="type">
            @foreach ($roomtypes as $roomtype)
                <option value="{{$roomtype->id_RoomType}}" @if ($roomtype->id_RoomType == $special->id_RoomType)
                    selected
                @endif>{{$roomtype->type}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <input type="hidden" name="check" value="ok" id="check">
    <button type='submit' class='btn' style='background-color: #4e73df;color:white;'>Salveaza</button>
    <button type='submit' class='btn btn-danger' style="margin-left: 15px" id="del">Sterge</button>
    @if(Session::get('message'))
    <p style='color: green; margin-top: 15px;'>Tipul de camera a fost actualizat</p>
    @endif
    @if(Session::get('errMsg'))
    <p style='color: red; margin-top: 15px;'>Eroare la introducerea datelor</p>
    @endif
  </form>

@endsection

@section('scripts')
<script>

$("#del").on('click', function() {
  document.getElementById('check').value = "delete";
});

</script>
@endsection
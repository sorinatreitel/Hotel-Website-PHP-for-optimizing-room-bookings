@extends('admin.template')

@section('title', 'Editeaza Camera')
@section('subtitle', "Gestioneaza camerele")

@section('styles')
<style>

.checkbx {
  position: relative;
  margin-left: 0px;
}

.my-list-item {
  margin-bottom: 0px;
}

</style>
@endsection

@section('content')

@php
    use App\Models\RoomType;
    use App\Models\Facility;
    use App\Http\Controllers\AdminController;

    $facilities = Facility::all();

    $roomtype = RoomType::find($room->id_RoomType);
    $roomtypes = RoomType::all();
@endphp
<div class="row">
<form class='col-lg-4 col-sm-10 dri-form' method='post' action="{{route('admin-edit-room-post', ['id' => $room->id_Room])}}">
    @csrf
    <div class="form-group row">
      <label for="staticID" class="col-sm-4 col-form-label">ID</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext" id="staticID" value="{{$room->id_Room}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="staticNumber" class="col-sm-4 col-form-label">Numar Camera</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name='number' id="staticNumber" value="{{$room->roomNumber}}">
      </div>
    </div>
    <div class="form-group row">
        <label for="staticStatus" class="col-sm-4 col-form-label">Status</label>
        <div class="col-sm-8">
          <select class="form-control" name='status' id="staticStatus">
            <option value='vizibil' @if($room->status == 'vizibil') selected @endif>Vizibil</option>
            <option value="invizibil" @if($room->status == 'invizibil') selected @endif>Invizibil</option>
          </select>
        </div>
      </div>
    <div class="form-group row">
      <label for="inputType" class="col-sm-4 col-form-label">Tipul</label>
      <div class="col-sm-8">
        <select class="form-control" name='type'>
            @foreach ($roomtypes as $types)
                <option value="{{$types->id_RoomType}}" @if($room->id_RoomType == $types->id_RoomType)selected @endif>{{$types->type}}</option>
            @endforeach
        </select>
      </div>
    </div>
    <div class="form-group row">
        <label for="inputPrice" class="col-sm-4 col-form-label">Pret <span style="color: grey">({{$roomtype->type}})</span> RON </label>
        <div class="col-sm-8">
          <input type="text" name='price' readonly class="form-control-plaintext" id="inputPrice" value="{{$roomtype->price}}">
        </div>
      </div>
    <div class="form-group row">
      <label for="inputDesc" class="col-sm-4 col-form-label">Desriere <span style="color: grey">({{$roomtype->type}})</span></label>
      <div class="col-sm-8">
        <input type="text" name='description' readonly class="form-control-plaintext" id="inputDesc" value="{{$roomtype->description}}">
      </div>
    </div>
    <div class="form-group row">
        <label for="inputCap" class="col-sm-4 col-form-label">Capacitate <span style="color: grey">({{$roomtype->type}})</span></label>
        <div class="col-sm-8">
          <input type="text" name='capacity' readonly class="form-control-plaintext" id="inputCap" value="{{$roomtype->capacity}}">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputimg" class="col-sm-4 col-form-label">Imagine</span></label>
        <div class="col-sm-8">
          <img src="{{asset('/images/' . $room->image)}}" class="img-fluid" style="border-radius: 10px">
        </div>
      </div>
      <input type="hidden" name="check" id="check" value="ok">
    <button type='submit' class='btn' style='background-color: #4e73df;color:white;'>Salveaza</button>
    <button type='submit' id="del" class='btn' style='background-color: red;color:white;'>Sterge</button>
    @if(Session::get('message'))
    <p style='color: green; margin-top: 15px;'>Camera a fost actualizata</p>
    @endif
  </form>


  <div class="col-lg-8" style="padding-left: 4rem">
    <div class="col-lg-6">
      <h6 class=" fw-semibold">Lista Facilitati</h6>
      <div class="demo-inline-spacing mt-3">
        <div class="list-group" style="background-color: white">
          @foreach($facilities as $facility)
          <label class="list-group-item my-list-item">
            <input class="form-check-input me-1 checkbx" onchange="upload_changes(this)" id="chk_{{$facility->id_Facility}}" type="checkbox" value="" @if(AdminController::check_room_has_facility($room->id_Room, $facility->id_Facility)) checked @endif/>
            {{$facility->name}}
          </label>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>

function upload_changes(elem) {
  var stuff = elem.id.split('_');

  var fac_id = stuff[1];
  var room_id = {{$room->id_Room}};

  if(elem.checked) {
    $.ajax({
      type: "POST",
      url: "{{route('admin-add-facility-to-room')}}",
      data: {'_token': '{{ csrf_token() }}', 'id_Room': room_id, 'id_Facility': fac_id},
    });
  }else {
    $.ajax({
      type: "POST",
      url: "{{route('admin-remove-facility-from-room')}}",
      data: {'_token': '{{ csrf_token() }}', 'id_Room': room_id, 'id_Facility': fac_id},
    });
  }
}

$('#del').on('click', function() {
  document.getElementById('check').value = "delete";
})

</script>
@endsection
@extends('admin.template')

@section('title', 'Adauga Tip Camera nou')
@section('subtitle', "Gestioneaza camerele")

@section('content')

<form class='col-lg-4 col-sm-10 dri-form' method='post' action="{{route('admin-add-roomtype-post')}}">
    @csrf
    <div class="form-group row">
      <label for="inputType" class="col-sm-4 col-form-label">Tip</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name='type' id="inputType" required>
      </div>
    </div>
    <div class="form-group row">
        <label for="inputDesc" class="col-sm-4 col-form-label">Descriere</label>
        <div class="col-sm-8">
          <input type="text" name='description' class="form-control" id="inputDesc" required>
        </div>
      </div>
    <div class="form-group row">
      <label for="inputPrice" class="col-sm-4 col-form-label">Pret (RON)</label>
      <div class="col-sm-8">
        <input type="number" name='price' class="form-control" id="inputPrice" required>
      </div>
    </div>
    <div class="form-group row">
        <label for="inputCapacity" class="col-sm-4 col-form-label">Capacitate (nr. pers)</label>
        <div class="col-sm-8">
          <input type="number" name='capacity' class="form-control" id="inputcapacity" required>
        </div>
      </div>
    <button type='submit' class='btn' style='background-color: #4e73df;color:white;'>Salveaza</button>
  </form>

@endsection
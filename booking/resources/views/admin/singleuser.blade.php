@extends('admin.template')

@section('title', 'Editeaza utilizatorul')
@section('subtitle', "Gestioneaza utilizatorii")

@section('content')

<form class='col-lg-4 col-sm-10 dri-form' method='post' action="{{route('admin-edit-user-post', ['id' => $user->id_User])}}">
    @csrf
    <div class="form-group row">
      <label for="staticID" class="col-sm-4 col-form-label">ID</label>
      <div class="col-sm-8">
        <input type="text" readonly class="form-control-plaintext" id="staticID" value="{{$user->id_User}}">
      </div>
    </div>
    <div class="form-group row">
      <label for="staticName" class="col-sm-4 col-form-label">Nume Complet</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name='name' id="staticName" value="{{$user->name}}">
      </div>
    </div>
    <div class="form-group row">
        <label for="staticUserName" class="col-sm-4 col-form-label">Username</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name='username' id="staticUserName" value="{{$user->username}}">
        </div>
      </div>
    <div class="form-group row">
      <label for="inputEmail" class="col-sm-4 col-form-label">Email</label>
      <div class="col-sm-8">
        <input type="email" name='email' class="form-control" id="inputEmail" placeholder="Email" value="{{$user->email}}">
      </div>
    </div>
    <div class="form-group row">
        <label for="inputPhone" class="col-sm-4 col-form-label">Telefon</label>
        <div class="col-sm-8">
          <input type="text" name='phoneNumber' class="form-control" id="inputphone" placeholder="Numar de telefon" value="{{$user->phoneNumber}}">
        </div>
      </div>
    <div class="form-group row">
      <label for="inputAdmin" class="col-sm-4 col-form-label">Rol</label>
      <div class="col-sm-8">
        <select class="form-control" name="userType">
            <option value="admin" @if($user->userType == 'admin') selected @endif>Administrator</option>
            <option value="client" @if($user->userType == 'client') selected @endif>Client</option>
        </select>
      </div>
    </div>
    <button type='submit' class='btn' style='background-color: #4e73df;color:white;'>Salveaza</button>
    @if(Session::get('message'))
    <p style='color: green; margin-top: 15px;'>Userul {{$user->name}} a fost actualizat</p>
    @endif
  </form>

@endsection
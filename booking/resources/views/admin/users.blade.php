@extends('admin.template')

@section('title', 'Utilizatori')
@section('subtitle', "Gestioneaza utilizatorii")

@section('content')

@php
    use App\Models\User;
    $users = User::all();
@endphp

<div class="row" style="margin-bottom: 300px">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Toti Utilizatorii</h4>
        <div class="table-responsive">
          <table class="table table-striped" style='text-align: center'>
            <thead>
              <tr>
                <th>
                  Username
                </th>
                <th>
                  Nume intreg
                </th>
                <th>
                  Email
                </th>
                <th>
                  Rol
                </th>
                <th>
                  Actiuni
                </th>
              </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
              <tr>
                <td class="py-1">
                  {{$user->username}}
                </td>
                <td>
                  {{$user->name}}
                </td>
                <td>
                  {{$user->email}}
                </td>
                <td>
                  @if($user->userType == 'admin')
                    Administrator
                  @else
                    Client
                  @endif
                </td>
                <td>
                  <a href="{{route('admin-users-edit', ['id' => $user->id_User])}}"><button class="dri-btn">Edit</button>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
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

if(!document.getElementById('users').classList.contains('active')) {
    document.getElementById('users').classList.add('active');
}

if(document.getElementById('rooms').classList.contains('active')) {
    document.getElementById('rooms').classList.remove('active');
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

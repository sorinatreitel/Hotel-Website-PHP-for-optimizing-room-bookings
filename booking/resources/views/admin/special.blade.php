@extends('admin.template')

@section('title', 'Perioade Speciale')
@section('subtitle', "Gestioneaza perioadele speciale")

@section('content')

@php
    use App\Models\SpecialDate;
    use App\Models\RoomType;

    $specials = SpecialDate::all();
@endphp

<div class="row">
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Perioade cu pret special</h4>
        <div class="table-responsive">
          <table class="table table-striped" style="text-align: center">
            <thead>
              <tr>
                <th>
                  Data Start
                </th>
                <th>
                  Data Final
                </th>
                <th>
                  Pret
                </th>
                <th>
                  Tipul de Camera
                </th>
                <th>
                  Actiuni
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach($specials as $special)

              @php
                  $type = RoomType::find($special->id_RoomType);
              @endphp

              <tr>
                <td class="py-1">
                  {{$special->dateStart}}
                </td>
                <td>
                  {{$special->dateEnd}}
                </td>
                <td>
                  {{$special->price}} RON
                </td>
                <td>
                  {{$type->type}}
                </td>
                <td>
                  <a href="{{route('admin-edit-special', ['id' => $special->id_HistoryPrice])}}"><button class="dri-btn">Edit</button></a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <a href="{{route('admin-add-special')}}"><button class="btn btn-primary"  style='margin-top: 15px'>Adauga Perioada</button></a>
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

if(document.getElementById('bookings').classList.contains('active')) {
    document.getElementById('bookings').classList.remove('active');
}

if(document.getElementById('packages').classList.contains('active')) {
    document.getElementById('packages').classList.remove('active');
}

if(!document.getElementById('special').classList.contains('active')) {
    document.getElementById('special').classList.add('active');
}
}

</script>
@endsection
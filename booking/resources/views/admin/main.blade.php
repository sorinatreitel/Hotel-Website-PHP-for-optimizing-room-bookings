@extends('admin.template')

@section('title', "Gestionarea hotelului")

@section('styles')
<style>
.completed {
  display: none!important;
}
</style>
@endsection

@section('content')



@endsection

@section('scripts')
<script>

window.onload = function() {
if(!document.getElementById('dashboard').classList.contains('active')) {
    document.getElementById('dashboard').classList.add('active');
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

if(document.getElementById('special').classList.contains('active')) {
    document.getElementById('special').classList.remove('active');
}
}

$(".checkbox").each(function () {
  $(this).change(function () {
    //var id = $(this).attr('id');
    $(this).parent().parent().parent().remove();
  });
});



$("#todo").on('click', function () {
  $(".checkbox").each(function () {
    if($(this).is(":checked")) {
      $(this).parent().parent().parent().remove();
    }
});
});

</script>
@endsection
@extends('layouts.app')

@section('content')

    <h3 class="text-center">Загадайте двузначное число и нажмите на кнопку</h3>
    <div class="text-center pt-5">
        <button onclick="window.location.href = '/go';" type="button" class="btn btn-warning  btn-lg">Готово</button>
    </div>

@endsection

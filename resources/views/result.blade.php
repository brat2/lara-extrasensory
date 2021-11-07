@extends('layouts.app')

@section('content')

    <h2 class="text-center">Давайте попробуем ещё разок?</h2>
    <h3 class="text-center">Загадайте двузначное число и нажмите на кнопку</h3>
    <div class="text-center pt-5">
        <button onclick="window.location.href = '/go';" type="button" class="btn btn-warning  btn-lg">Готово</button>
    </div>

    <div>
        @include('stat')
    </div>

@endsection

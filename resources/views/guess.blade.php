@extends('layouts.app')

@section('content')

    <div>
        <h4 class="text-center">Догадки экстрасенсов</h4>
        <ul class="list-group">
            @foreach ($extrasensList as $extrasens)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $extrasens->getName() }}
                    <span class="badge badge-primary badge-pill">
                        {{ $extrasens->getLastGuess() }}
                    </span>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="text-center pt-5">
        @if(null !== session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif
        <h4>Введите загаданное число</h4>
        <form action="/answer" method="POST">
            @csrf
            <input type="text" name="answer">
            <input type="submit" value="отправить">
        </form>
    </div>

@endsection

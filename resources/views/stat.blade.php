<div class="row pt-5 mb-3">
    <div class="col">
        <div class="bg-secondary text-white text-center p-2">Загаданные числа</div>
        <div class="p-3 border">
            @foreach ($numberList as $number)
                {{ $number }}
            @endforeach
        </div>
    </div>
</div>

@foreach ($extrasensList as $extrasens)
    <div class="row mb-3">
        <div class="col">
            <div class="bg-secondary text-white text-center p-2">
                {{ $extrasens->getName() }}
            </div>
            <div class="p-2 border">
                <p>
                    <span class="font-weight-bold">История догадок:</span>

                    @foreach ($extrasens->getGuessList() as $guess)
                        {{ $guess }}
                    @endforeach

                </p>
                <p><span class="font-weight-bold">Достоверность:</span>
                    <span class="badge badge-secondary badge-pill">
                        {{ $extrasens->getResult() }}
                    </span>
                </p>
            </div>
        </div>
    </div>
@endforeach

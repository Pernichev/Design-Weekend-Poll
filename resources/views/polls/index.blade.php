@extends('main')

@section('title', 'Избери анкета')

@section('content')

    <div class="row">
        <div class="span1-9">
            <h2 class="white">Избери анкета</h2>
            <br/>
                @foreach($questions as $question)
                    <strong><h1><a class="white hover" style="text-decoration: none;" href="{{ route('poll.show', $question->id) }}">{{ $question->question }}</a></h1></strong>
                @endforeach
        </div>
    </div>

@endsection
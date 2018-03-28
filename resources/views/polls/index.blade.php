@extends('main')

@section('title', '| Take Survery')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Choose a Question</h1>
            <hr>
            <ol>
                @foreach($questions as $question)
                    <p><li><a href="{{ route('poll.show', $question->id) }}">{{ $question->question }}</a></li></p>
                @endforeach
            </ol>
        </div>
    </div>

@endsection
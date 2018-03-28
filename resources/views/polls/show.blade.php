@extends('main')

@section('title', '| Take Survery')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Choose an Option</h3>
            <hr>
            <h1>{{ $question->question }}</h1>
            {{ Form::open(['route' => ['poll.vote', $question->id], 'method' => 'POST']) }}

                @foreach($question->options as $option)
                   <p>{{ Form::radio('choice', $option->id) }} {{ Form::label('choice', $option->description) }}</p>
                @endforeach

                {{ Form::submit('Submit', ['class' => 'btn btn-success', 'style' => 'margin-top:15px']) }}

            {{ Form::close() }}

            <hr/>

            <p><a href="{{ route('poll.index') }}">Return to Questions</a></p>

        </div>
    </div>

@endsection

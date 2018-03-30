@extends('main')

@section('title', '| Take Survery')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3 class="white">Гласувай!</h3>
            <hr>
            <h1 class="white">{{ $question->question }}</h1>
            {{ Form::open(['route' => ['poll.vote', $question->id], 'method' => 'POST']) }}

                @foreach($question->options as $option)
                {{--<p>{{ Form::radio('choice', $option->id) }} {{ Form::label('choice', $option->description) }}</p>--}}
                <p class="white">
                    <input type="radio" class="radios" name="choice" id="{{$option->id}}" value="{{$option->id}}">
                    <label class="label-select" for="{{$option->id}}">{{$option->description}}</label>
                </p>
            @endforeach

                {{ Form::submit('Submit', ['class' => 'btn btn-success', 'style' => 'margin-top:15px; background-color:white; color:#227ed6; border:none;']) }}

            {{ Form::close() }}

            {{--<hr/>--}}

            {{--<p><a href="{{ route('poll.index') }}">Назад</a></p>--}}

        </div>
    </div>

@endsection

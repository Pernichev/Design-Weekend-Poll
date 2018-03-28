@extends('main')

@section('title', '| Create a question')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1>Create a Question</h1>
            <hr>

            {{ Form::open(['route' => 'question.store']) }}

                {{ Form::label('question', 'Question:') }}
                {{ Form::textarea('question', null, array('class' => 'form-control')) }}

                {{ Form::submit('Submit Question', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;']) }}

            {{ Form::close() }}
        </div>
    </div>

@endsection
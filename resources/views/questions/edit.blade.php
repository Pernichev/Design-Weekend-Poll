@extends('main')

@section('title', '| Create a question')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 white">
            <h1>Edit Question</h1>
            <hr>

            {{ Form::model($question, ['route' => ['question.update', $question->id], 'method' => 'PUT']) }}

                {{ Form::label('question', 'Question:') }}
                {{ Form::textarea('question', null, array('class' => 'form-control')) }}

                {{ Form::submit('Update Question', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;']) }}

            {{ Form::close() }}
        </div>
    </div>

@endsection
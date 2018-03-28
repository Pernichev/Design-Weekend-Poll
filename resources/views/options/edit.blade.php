@extends('main')

@section('title', '| Edit Option')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            Edit Option for question: <strong>{{ $question->question }}</strong>
            <hr>

            {{ Form::model($option, ['route' => ['option.update', $option->id, $question->id], 'method' => 'PUT']) }}

                {{ Form::label('description', 'Description:') }}
                {{ Form::text('description', null, array('class' => 'form-control')) }}

                {{ Form::submit('Update Option', ['class' => 'btn btn-block btn-success', 'style' => 'margin-top: 15px;']) }}

            {{ Form::close() }}
        </div>
    </div>

@endsection
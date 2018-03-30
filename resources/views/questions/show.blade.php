@extends('main')

@section('title', '| Create a question')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2 white">
            <strong>{{ $question->question }}</strong>
            <a href="{{ route('question.edit', $question->id) }}" class="btn btn-primary pull-right">Edit Question</a>
            <br/>
            <br/>
            {{ Form::open(['route' => ['option.store', $question->id], 'method' => 'POST']) }}

                {{ Form::label('description', 'Option:') }}
                {{ Form::text('description', null, ['class' => 'form-control']) }}

                {{ Form::submit('Add', ['class' => 'btn btn-success', 'style' => 'margin-top:15px;margin-bottom:15px;']) }}

            {{ Form::close() }}

            <p><strong>Options for this Question</strong></p>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Option</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($question->options as $option)
                        <tr>
                            <th>{{ $option->id }}</th>
                            <td>{{ $option->description }}</td>
                            <td>
                                <a href="{{ route('option.edit', [$option->id, $question->id]) }}" class="btn btn-default">Edit</a>
                            </td>
                            <td>
                                {{ Form::open(['route' => ['option.destroy',  $option->id, $question->id], 'method' => 'DELETE']) }}
                                    {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                {{ Form::close() }}
                            </td>
                        </tr>
                 @endforeach
                </tbody>
            </table>
            <hr>
            <a href="{{ route('question.result', $question->id) }}" class="btn btn-default pull-left">View Results</a>
            {{ Form::open(['route' => ['question.destroy', $question->id], 'method' => 'DELETE']) }}
                {{ Form::submit('Delete Question', ['class' => 'btn btn-danger pull-right']) }}
            {{ Form::close() }}
        </div>
    </div>

@endsection
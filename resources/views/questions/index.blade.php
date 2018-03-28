@extends('main')

@section('title', '| Create a question')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <strong>Manage Poll Questions</strong>
            <a href="{{ route('question.create') }}" class="btn btn-primary pull-right">Create a Question</a>
            <hr>

            <ol>
                @foreach($questions as $question)
                    <li><p><a href="{{ route('question.show', $question->id) }}">{{ $question->question }}</a></p></li>
                @endforeach
            </ol>
        </div>
    </div>

@endsection
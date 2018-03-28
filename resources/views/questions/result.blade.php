@extends('main')

@section('title', '| Create a question')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <p>Results this question | <strong>{{ $question->question }}</strong></p>

            <hr/>

            @foreach($question->options as $option)
                @if($sum === 0)
                    <p>
                        <span><strong>{{ $option->description }}</strong></span>
                        <div style="height: 20px; margin-bottom: 10px; width: {{ 0 * 100 * 10}}px; background-color: green;"></div>
                        <span>{{ 0 }}%</span> -
                        <span>{{ $option->votes_count }}{{ $option->votes_count > 1 ? 'votes' : 'vote' }}</span>
                        </p>
                    <hr/>
                @else
                    <p>
                        <span><strong>{{ $option->description }}</strong></span>
                        <div style="height: 20px; margin-bottom: 10px; width: {{ ($option->votes_count/$sum) * 100 * 10}}px; background-color: green;"></div>
                        <span>{{ ($option->votes_count/$sum) * 100 }}%</span> -
                        <span>{{ $option->votes_count }}{{ $option->votes_count > 1 ? "votes" : "vote" }}</span>
                    </p>
                    <hr/>
                @endif
            @endforeach
        </div>
    </div>

@endsection
@extends('main')

@section('title', '| Create a question')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <p class="white polls-text"><strong>{{ $question->question }}</strong></p>

            <br/>

            @foreach($question->options as $option)
                @if($sum === 0)
                    <p class="white">
                        <span><strong>{{ $option->description }}</strong></span>
                        <div style="height: 20px; margin-bottom: 10px; width: {{ 0 * 100 * 10}}px; background-color: green;"></div>
                        <span class="white">{{ 0 }}%</span> -
                        <span class="white">{{ $option->votes_count }}{{ $option->votes_count > 1 ? 'votes' : 'vote' }}</span>
                        </p>
                    <hr/>
                @else
                    <p class="white">
                        <span><strong>{{ $option->description }}</strong></span>
                        <div style="height: 20px; margin-bottom: 10px; width: {{ ($option->votes_count/$sum) * 100 * 10}}px; background-color: green;"></div>
                    <span class="white">{{ number_format(($option->votes_count/$sum) * 100, 1) }}%</span> <span class="white">|</span>
                        <span class="white">{{ $option->votes_count }}{{ $option->votes_count > 1 ? " гласа" : " глас" }}</span>
                    </p>
                    <hr/>
                @endif
            @endforeach
        </div>
    </div>

@endsection
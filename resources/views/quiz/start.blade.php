@extends('layouts.app')
@section('content')
<h1>Quiz</h1>
<form method="POST" action="{{ route('quiz.submit') }}">
@csrf
@foreach($questions as $q)
<div>
<p>{{ $q->question }}</p>
@if($q->type==='multiple_choice')
@foreach($q->options as $opt)
<label><input type="radio" name="answers[{{ $q->id }}]" value="{{ $opt }}"> {{ $opt }}</label><br>
@endforeach
@else
<input type="text" name="answers[{{ $q->id }}]">
@endif
</div>
@endforeach
<button type="submit">Indienen</button>
</form>
@endsection

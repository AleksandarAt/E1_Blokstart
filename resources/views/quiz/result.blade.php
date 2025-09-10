@extends('layouts.app')
@section('content')
<h1>Resultaat</h1>
<p>Score: {{ $attempt->score }}/{{ $attempt->answers->count() }}</p>
<ul>
@foreach($attempt->answers as $a)
<li>
Vraag: {{ $a->question->question }}<br>
Jouw antwoord: {{ $a->given_answer }}<br>
Correct: {{ $a->is_correct?'Ja':'Nee' }}<br>
Juiste antwoord: {{ $a->question->answer }}
</li>
@endforeach
</ul>
@endsection

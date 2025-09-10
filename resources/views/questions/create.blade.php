@extends('layouts.app')
@section('content')
<h1>Nieuwe vraag</h1>
<form method="POST" action="{{ route('questions.store') }}">
@csrf
<label>Vraag</label><input type="text" name="question" required>
<label>Type</label>
<select name="type">
<option value="multiple_choice">Multiple Choice</option>
<option value="open">Open</option>
</select>
<label>Opties (| gescheiden)</label><input type="text" name="options">
<label>Antwoord</label><input type="text" name="answer" required>
<button type="submit">Opslaan</button>
</form>
@endsection

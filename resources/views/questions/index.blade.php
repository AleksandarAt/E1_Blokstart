@extends('layouts.app')
@section('content')
<h1>Vragen</h1>
<a href="{{ route('questions.create') }}">Nieuwe vraag</a>
<form action="{{ route('questions.uploadCsv') }}" method="POST" enctype="multipart/form-data">
@csrf
<input type="file" name="csv_file" required>
<button type="submit">Upload CSV</button>
</form>
<ul>@foreach($questions as $q)<li>{{ $q->question }} ({{ $q->type }})</li>@endforeach</ul>
@endsection

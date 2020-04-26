@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('searchTutorial') }}" class="formStyle" enctype="multipart/form-data">   
        {{ csrf_field() }}
        <h2 class="headline">Wyszukiwanie</h2>
		<input name="search" class="inputText" setype="text">
		<button type="submit" class="buttonStyle buttonSubmit" style="margin-top: 10px;">Szukaj</button>
	</form>
@endsection
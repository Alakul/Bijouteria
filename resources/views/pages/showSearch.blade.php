@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('searchTutorial') }}" class="formStyle" enctype="multipart/form-data">   
        <h2 class="headline">Wyszukiwanie</h2>
        {{ csrf_field() }}
		<input name="search" class="inputText" setype="text" placeholder="Szukaj...">
		<button type="submit" class="buttonStyle buttonSubmit" style="margin-top: 30px;">Szukaj</button>
	</form>
@endsection
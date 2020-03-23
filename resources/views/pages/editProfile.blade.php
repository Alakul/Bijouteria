@extends('layouts.app')
@section('content')
<form method="POST" action="{{ action('ProfileController@store') }}" class="formStyle" enctype="multipart/form-data">
    {{csrf_field()}}
	<h2 class="headline">Edytuj profil</h2>
	<div class="inputArea"> 
        <br>
        <label>Zdjęcie</label><br>
        <input name="avatar" id="avatar" class="fileToUpload" type="file" required onchange="loadPreview(this);"><br>
        <img id="avatarPreview" src="#" class="previewImg" height="200px"/><br>
        <label>Informacje o Twoim profilu</label><br>
        <textarea name="info" class="inputText" type="text" maxlength="1000"></textarea><br>

		<button type="submit" class="buttonStyle" style="margin: 30px auto auto auto;" onclick="inputRequired()">Zapisz</button>
	</div>
</form>
@endsection
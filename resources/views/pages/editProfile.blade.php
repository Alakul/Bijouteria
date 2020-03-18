@extends('layouts.app')
@section('content')
<form method="POST" action="{{ action('TutorialController@store') }}" class="formStyle" enctype="multipart/form-data">
        {{ csrf_field() }}
		<h2>Edytuj profil</h2>
		<div class="inputArea"> 
            <label>Zdjęcie</label><br>
            <input name="image_0" id="image_0" class="fileToUpload" type="file" required onchange="loadPreview(this);"><br>
            <img id="imagePreview_0" src="#" class="preview" height="200px"/><br>

            <label>Informacje o Twoim profilu</label><br>
            <textarea name="description_0" class="inputText" type="text" maxlength="1000"></textarea><br>

			<button type="submit" class="buttonStyle" style="margin: 30px auto 30px auto; display: block;" onclick="inputRequired()">Zapisz</button>
		</div>
    </form>
@endsection
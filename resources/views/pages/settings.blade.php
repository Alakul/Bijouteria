@extends('layouts.app')
@section('content')
<form method="POST" action="{{ action('TutorialController@store') }}" class="formStyle" enctype="multipart/form-data">
        {{csrf_field()}}
		<h2 class="headline">Ustawienia</h2>
		<div class="inputArea"> 
            <label>Zmień email</label><br>
            <input name="image_0" id="image_0" class="imageToUpload" type="file" required onchange="loadPreview(this);"><br>
            <img id="imagePreview_0" src="#" class="previewImg" height="200px"/><br>

            <label>Zmień hasło</label><br>
            <textarea name="description_0" class="inputText" type="text" maxlength="1000"></textarea><br>

			<button type="submit" class="buttonStyle" style="margin: 30px auto 30px auto; display: block;" onclick="inputRequired()">Zapisz</button>
		</div>
    </form>
@endsection
@extends('layouts.app')
@section('content')
    <center>
		<form method="POST" action="{{ route('login') }}" class="formStyle">
			<h2>DODAJ PORADNIK</h2>
			<div class="inputArea">
				<input id="title" name="title" class="inputText" type="text" placeholder="Tytuł"><br/> 
				<textarea id="describtion" name="description" class="inputText" type="text" placeholder="Opis" rows="4" cols="50"></textarea><br/>
				<label>Zdjęcie tutyłowe</label></br>

                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload"><br/>
                    <button type="submit" class="btn btn-success">Upload</button>
                </form>
                </br>

                <input id="category" name="category" class="inputText" type="text" placeholder="Kategoria"><br/>
                <label>Wymagane materiały</label>
                <ul id="materialsList">
                    <li><input id="materials" name="materials" class="inputText" type="text"><i class="fa fa-close"></i></li>
                </ul>
                <button id ="materialsButton" type="button" onclick="addToList(this);"><i class="fa fa-plus"></i></button></br>

                <label>Wymagane narzędzia</label>
                <ul id="toolsList">
                    <li><input id="tools" name="tools" class="inputText" type="text"><i class="fa fa-close"></i></li>
                </ul>
                <button id ="toolsButton" type="button" onclick="addToList(this);"><i class="fa fa-plus"></i></button></br>

                <div>
                    <ul id="stepsList">
                        <li>
                            <label>Krok:</label></br>
                            <textarea id="photo" name="photo" class="inputText" type="text" placeholder="Zdjęcie" rows="4" cols="50"></textarea><br/>
                            <input id="descriptionStep" name="descriptionStep" class="inputText" type="text" placeholder="Opis"><br/> 
                        </li>
                    </ul>
                </div>
                <button id ="stepsButton" type="button" onclick="addToList(this);"><i class="fa fa-plus"></i></button></br>
				<button type="submit" class="buttonStyle" style="margin: 30px; font-size: 16px;">Opublikuj</button>
			</div>
		</form>
    </center>
@endsection
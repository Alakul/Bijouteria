@extends('layouts.app')
@section('content')
		<form method="POST" action="{{ route('login') }}" class="formStyle">
			<h2>Dodaj poradnik</h2>
			<div class="inputArea">
                <label>Tytuł</label></br>
				<input id="title" name="title" class="inputText" type="text"><br/> 
                
                <label>Opis</label></br>
                <textarea id="describtion" name="description" class="inputText" type="text" rows="4" cols="50"></textarea><br/>
                
                <label>Zdjęcie tutyłowe</label></br>
                <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload"></br>
                    <button type="submit" class="btn btn-success">Upload</button>
                </form>
                </br>

                <label for="category">Kategoria</label>
                <select id="category">
                    <option value="bracelets">Bransoletki</option>
                    <option value="brooches">Broszki</option>
                    <option value="earrings">Kolczyki</option>
                    <option value="necklaces">Naszyjniki</option>
                    <option value="hairAcessories">Ozdoby do włosów</option>
                    <option value="rings">Pierścionki</option>
                    <option value="others">Inne</option>
                </select></br>

                <label>Wymagane materiały</label>
                <ul id="materialsList">
                    <li><input id="materials" name="materials" class="inputText" type="text"></li>
                </ul>
                <button id ="materialsButton" class="buttonStyle" type="button" onclick="addToList(this);"><i class="fa fa-plus"></i></button></br>

                <label>Wymagane narzędzia</label>
                <ul id="toolsList">
                    <li><input id="tools" name="tools" class="inputText" type="text"></li>
                </ul>
                <button id ="toolsButton" class="buttonStyle" type="button" onclick="addToList(this);"><i class="fa fa-plus"></i></button></br>

                <div>
                    <ul id="stepsList">
                        <li id="steps">
                            <h3>Krok:</h3></br>
                            <label>Zdjęcie</label></br>
                            <textarea id="photo" name="photo" class="inputText" type="text" rows="4" cols="50"></textarea><br/>
                            <label>Opis</label>
                            <input id="descriptionStep" name="descriptionStep" class="inputText" type="text"><br/> 
                        </li>
                    </ul>
                </div>
                <button id ="stepsButton" type="button" onclick="addToList(this);"><i class="fa fa-plus"></i></button></br>
				<button type="submit" class="buttonStyle" style="margin: 30px; font-size: 16px;">Opublikuj</button>
			</div>
		</form>
@endsection
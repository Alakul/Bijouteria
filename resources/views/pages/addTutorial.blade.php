@extends('layouts.app')
@section('content')
	<form method="POST" action="{{ route('image.upload.post') }}" class="formStyle" enctype="multipart/form-data">
        {{ csrf_field() }}
		<h2>Dodaj poradnik</h2>
		<div class="inputArea">
            <label>Tytuł <span style="color: red;">*</span></label></br>
			<input id="title" name="title" class="inputText" type="text"><br/> 
                
            <label>Opis</label></br>
            <textarea id="describtion" name="description" class="inputText" type="text"></textarea><br/>
                
            <label>Zdjęcie tytułowe <span style="color: red;">*</span></label></br>
            <input type="file" id="fileToUpload" name="fileToUpload" onchange="loadPreview(this);"></br>
            <img id="imagePreview" src="#" class="preview" height="100px"/></br>

            <label for="category">Kategoria <span style="color: red;">*</span></label>
            <select id="category">
                <option value="bracelets">Bransoletki</option>
                <option value="brooches">Broszki</option>
                <option value="earrings">Kolczyki</option>
                <option value="necklaces">Naszyjniki</option>
                <option value="hairAcessories">Ozdoby do włosów</option>
                <option value="rings">Pierścionki</option>
                <option value="others">Inne</option>
            </select>

            <label>Wymagane materiały</label>
            <ul id="materialsList">
                <li><input id="materials" name="materials" class="inputText" type="text" style="margin: 6px 20px 6px 20px;"></li>
            </ul>
            <button id ="materialsButton" class="buttonAdd" type="button" onclick="addToList(this);"><i id="plus" class="fa fa-plus"></i></button></br>

            <label>Wymagane narzędzia</label>
            <ul id="toolsList">
                <li><input id="tools" name="tools" class="inputText" type="text" style="margin: 6px 20px 6px 20px;"></li>
            </ul>
            <button id ="toolsButton" class="buttonAdd" type="button" onclick="addToList(this);"><i id="plus" class="fa fa-plus"></i></button></br>

            <div>
                <ol id="stepsList">
                    <li id="step_1" class="steps">
                        <h3>Krok 1:</h3></br>
                        <label>Zdjęcie</label></br>
                        <input id="input_1" type="file" class="fileToUpload" name="fileToUpload" onchange="loadPreview(this);"></br>
                        <img id="imagePreview" src="#" class="preview" height="100px"/></br>
                        <label>Opis</label>
                        <input id="description_1" name="descriptionStep" class="inputText" type="text"><br/> 
                    </li>
                </ol>
            </div>
            <button id ="stepsButton" class="buttonAdd" type="button" onclick="addToList(this);"><i id="plus" class="fa fa-plus"></i></button></br>
			<button type="submit" class="buttonStyle" style="margin: 30px auto 30px auto; display: block;">Opublikuj</button>
		</div>
    </form>
@endsection
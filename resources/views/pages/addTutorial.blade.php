@extends('layouts.app')
@section('content')
	<form method="POST" action="{{ action('TutorialController@store') }}" class="formStyle" enctype="multipart/form-data">
        {{ csrf_field() }}
		<h2>Dodaj poradnik</h2>
		<div class="inputArea">
            <label>Tytuł <span class="asterisk">*</span></label><br>
			<input name="title" class="inputText" type="text" maxlength="100" required><br> 
                
            <label>Opis</label><br>
            <textarea name="description_0" class="inputText" type="text" maxlength="1000"></textarea><br>
                
            <label>Zdjęcie tytułowe <span class="asterisk">*</span></label><br>
            <input name="input_0" id="input_0" class="fileToUpload" type="file" required onchange="loadPreview(this);"><br>
            <img id="imagePreview_0" src="#" class="preview" height="200px"/><br>

            <label for="category">Kategoria <span class="asterisk">*</span></label>
            <select name="category" id="category" required>
                <option value="">Wybierz</option>
                <option value="bracelets">Bransoletki</option>
                <option value="brooches">Broszki</option>
                <option value="earrings">Kolczyki</option>
                <option value="necklaces">Naszyjniki</option>
                <option value="hairAcessories">Ozdoby do włosów</option>
                <option value="rings">Pierścionki</option>
                <option value="pendants">Zawieszki</option>
                <option value="others">Inne</option>
            </select>

            <label>Wymagane materiały <span class="asterisk">*</span></label>
            <ul id="materialsList">
                <li><input name="materials_0" class="inputText" type="text" maxlength="100" required></li>
            </ul>
            <button id ="materialsButton" class="buttonAdd" type="button" onclick="addToList(this);"><i id="plus" class="fa fa-plus"></i></button><br>

            <label>Wymagane narzędzia <span class="asterisk">*</span></label>
            <ul id="toolsList">
                <li><input name="tools_0" class="inputText" type="text" maxlength="100" required></li>
            </ul>
            <button id ="toolsButton" class="buttonAdd" type="button" onclick="addToList(this);"><i id="plus" class="fa fa-plus"></i></button><br>

            <label>Poradnik</label>
            <div>
                <ol id="stepsList">
                    <li id="step_1" class="steps">
                    <h3 id="h3_1">Krok 1:</h3>
                    <i id="stepsIcon"></i>
                    <i id="stepsIcon" class="fas fa-arrow-down" onclick="replaceDown(this);"></i>
                    <i id="stepsIcon" class="fas fa-arrow-up" onclick="replaceUp(this);"></i><br>
                    <label>Zdjęcie <span class="asterisk">*</span></label><br>
                    <input name="input_1" id="input_1" class="fileToUpload"  type="file" onfocus="inputRequired(this)" accept=".jpeg, .jpg, .png, .gif, .svg" onchange="loadPreview(this);" required><br>
                    <img id="imagePreview_1" src="#" class="preview" height="200px"/><br>
                    <label>Opis <span class="asterisk">*</span></label>
                    <textarea name="description_1" class="inputText" type="text" maxlength="1000" required></textarea><br> 
                    </li>
                </ol>
            </div>
            <button id ="stepsButton" class="buttonAdd" type="button" onclick="addToList(this);"><i id="plus" class="fa fa-plus"></i></button><br>
			<button type="submit" class="buttonStyle" style="margin: 30px auto 30px auto; display: block;" onclick="inputRequired()">Opublikuj</button>
		</div>
    </form>
    <script>
        $(document).load(function() {
            clearInputs(); 
        });
    </script>
@endsection
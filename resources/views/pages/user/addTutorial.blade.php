@extends('layouts.app')
@section('content')
    @isset ($categories)
    @if(session()->has('success'))
        <div class=" alertSuccess">
            {{ session()->get('success') }}
        </div>
    @endif
        <form method="POST" action="{{ route('storeTutorial') }}" class="formStyle" enctype="multipart/form-data">
            {{ csrf_field() }}
            <h2 class="headline">Dodaj poradnik</h2>
            <div class="inputArea">
                <br>
                <label>Tytuł <span class="asterisk">*</span></label>
                <input name="title" class="inputText" type="text" minlength="3" maxlength="100" required>
                    
                <label>Opis</label>
                <textarea name="description_0" class="inputText" type="text" maxlength="900"></textarea>
                    
                <label>Zdjęcie tytułowe <span class="asterisk">*</span></label>
                <input name="image_0" id="image_0" class="imageToUpload" type="file" required onchange="loadPreview(this);">
                <div class="imageInput">
                    <div style="height: 100%; display: table-cell;">
                        <a id="imageButton_0" class="buttonStyle buttons" style="margin: 0;" onclick="imageInput(this);">Przeglądaj...</a>
                    </div>
                    <span id="fileName_0" class="fileName" >Nie wybrano pliku.</span>
                </div>
                <img id="imagePreview_0" src="#" class="previewImg" style="display: none;"/>

                <label for="category" style="margin-top: 40px;">Kategoria <span class="asterisk">*</span></label>
                <select name="category" id="category" required>
                    <option value="">Wybierz</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->category }}">{{ ucfirst(trans($category->category)) }}</option>
                    @endforeach
                </select>

                <label>Wymagane materiały <span class="asterisk">*</span></label>
                <ul id="materialsList">
                    <li id="materialRow_1">
                        <input name="material_1" class="inputText materialsInput" type="text" maxlength="100" required>
                        <div class="listElement"><i id="materialsIcon" class="fas fa-arrow-up" onclick="replaceUpList(this);" style="display: none;"></i></div>
                        <div class="listElement"><i id="materialsIcon" class="fa fa-close" onclick="deleteFromList(this);" style="display: none;"></i></div>
                    </li>
                </ul>
                <input type="hidden" name="materials_length" value="1">
                <button id ="materialsButton" class="buttonAdd" type="button" onclick="addToList(this);"><i id="plus" class="fa fa-plus"></i></button>

                <label>Wymagane narzędzia <span class="asterisk">*</span></label>
                <ul id="toolsList">
                    <li id="toolRow_1">
                        <input name="tool_1" class="inputText toolsInput" type="text" maxlength="100" required>
                        <div class="listElement"><i id="toolsIcon" class="fas fa-arrow-up" onclick="replaceUpList(this);" style="display: none;"></i></div>
                        <div class="listElement"><i id="toolsIcon" class="fa fa-close" onclick="deleteFromList(this);" style="display: none;"></i></div>
                    </li>
                </ul>
                <input type="hidden" name="tools_length" value="1">
                <button id ="toolsButton" class="buttonAdd" type="button" onclick="addToList(this);"><i id="plus" class="fa fa-plus"></i></button>

                <label>Poradnik</label>
                <div>
                    <ol id="stepsList">
                        <li id="step_1" class="steps">
                            <h3 id="h3_1">Krok 1:</h3>
                            <i id="stepsIcon" class="fa fa-close" onclick="deleteFromList(this);" style="margin-right: 0; display: none;"></i>
                            <i id="stepsIcon" class="fas fa-arrow-down" onclick="replaceDown(this);" style="margin-right: 0;"></i>
                            <i id="stepsIcon" class="fas fa-arrow-up" onclick="replaceUp(this);"></i><br>
                            <label>Zdjęcie <span class="asterisk">*</span></label>
                            <input name="image_1" id="image_1" class="imageToUpload" type="file" accept=".jpeg, .jpg, .png, .gif, .svg" onchange="loadPreview(this);" required>
                            <div class="imageInput">
                            <div style="height: 100%; display: table-cell;">
                                <a id="imageButton_1" class="buttonStyle buttons" style="margin: 0;" onclick="imageInput(this);">Przeglądaj...</a>
                            </div>
                                <span id="fileName_1" class="fileName">Nie wybrano pliku.</span>
                            </div>  
                            <img id="imagePreview_1" src="#" class="previewImg" style="display: none;"/><br>
                            <label>Opis <span class="asterisk">*</span></label>
                            <textarea name="description_1" class="inputText" type="text" maxlength="900" required></textarea>
                        </li>
                    </ol>
                </div>
                <input type="hidden" name="steps_length" value="1">
                <button id ="stepsButton" class="buttonAdd" type="button" onclick="addToList(this);"><i id="plus" class="fa fa-plus"></i></button>
                <button type="submit" class="buttonStyle buttonSubmit">Opublikuj</button>
            </div>
        </form>
    @endisset
@endsection
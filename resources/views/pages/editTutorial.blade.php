@extends('layouts.app')
@section('content')
    @isset($tutorials, $materials, $tools, $steps)
	<form method="POST" action="{{ route('editTutorial') }}" class="formStyle" enctype="multipart/form-data">
        <h2 class="headline">Edytuj poradnik</h2>
        {{ csrf_field() }}
		<div class="inputArea">
            <br>
            <label>Tytuł <span class="asterisk">*</span></label>
			<input name="title" class="inputText" type="text" minlength="3" maxlength="100" required value="{{ $tutorials->title }}">
                
            <label>Opis</label>
            <textarea name="description_0" class="inputText" type="text" maxlength="1000">{{ $tutorials->description }}</textarea>
                
            <label>Zdjęcie tytułowe <span class="asterisk">*</span></label>
            <input name="image_0" id="image_0" class="imageToUpload" type="file" onchange="loadPreview(this);" required>
            <div class="imageInput">
                <div style="height: 100%; display: table-cell;">
                    <a id="imageButton_0" class="imageButton" onclick="imageInput(this);">Przeglądaj...</a>
                </div>
                <span id="fileName_0" class="fileName" >Nie wybrano pliku.</span>
            </div>
            <img id="imagePreview_0" src="/tutorialsIMG/{{ $tutorials->title_picture }}" class="previewImg"/><br>

            <label for="category">Kategoria <span class="asterisk">*</span></label>
            <select name="category" id="category" required>
                <option value="">Wybierz</option>
                <option value="bransoletki">Bransoletki</option>
                <option value="broszki">Broszki</option>
                <option value="kolczyki">Kolczyki</option>
                <option value="naszyjniki">Naszyjniki</option>
                <option value="ozdoby do włosów">Ozdoby do włosów</option>
                <option value="pierścionki">Pierścionki</option>
                <option value="zawieszki">Zawieszki</option>
                <option value="inne">Inne</option>
            </select>

            <label>Wymagane materiały <span class="asterisk">*</span></label>
            <ul id="materialsList">
                @foreach ($materials as $indexKey => $material)
                    <?php $indexKey++; ?>
                    <?php if ($indexKey==1): ?>
                        <li><input name="material_<?php echo $indexKey; ?>" class="inputText materialsInput" type="text" maxlength="100" required style="margin-bottom: 8px; width: 100%;" value="{{ $material->material}}"><i id="materialsIcon" class="fa fa-close" onclick="deleteFromList(this);" style="display: none;"></i></li>
                    <?php else: ?>
                        <li><input name="material_<?php echo $indexKey; ?>" class="inputText materialsInput" type="text" maxlength="100" required style="margin-bottom: 8px;" value="{{ $material->material}}"><i id="materialsIcon" class="fa fa-close" onclick="deleteFromList(this);"></i></li>
                    <?php endif ?>
                @endforeach
            </ul>
            <button id ="materialsButton" class="buttonAdd" type="button" onclick="addToList(this);"><i id="plus" class="fa fa-plus" style="color: white;"></i></button>

            <label>Wymagane narzędzia <span class="asterisk">*</span></label>
            <ul id="toolsList">
                @foreach ($tools as $indexKey => $tool)
                    <?php $indexKey++; ?>
                    <?php if ($indexKey==1): ?>
                        <li><input name="tool_<?php echo $indexKey; ?>" class="inputText toolsInput" type="text" maxlength="100" required style="margin-bottom: 8px; width: 100%;" value="{{ $tool->tool}}"><i id="toolsIcon" class="fa fa-close" onclick="deleteFromList(this);" style="display: none;"></i></li>
                    <?php else: ?>
                        <li><input name="tool_<?php echo $indexKey; ?>" class="inputText toolsInput" type="text" maxlength="100" required style="margin-bottom: 8px;" value="{{ $tool->tool}}"><i id="toolsIcon" class="fa fa-close" onclick="deleteFromList(this);"></i></li>
                    <?php endif ?>
                @endforeach
            </ul>
            <button id ="toolsButton" class="buttonAdd" type="button" onclick="addToList(this);"><i id="plus" class="fa fa-plus" style="color: white;"></i></button>

            <label>Poradnik</label>
            <div>
                <ol id="stepsList">
                    @foreach ($steps as $indexKey => $step)
                        <li id="step_{{ $step->step }}" class="steps">
                            <?php $indexKey++; ?>
                                <h3 id="h3_{{ $step->step }}">Krok {{ $step->step }}:</h3>
                            <?php if ($indexKey==1): ?>
                                <i id="stepsIcon" class="fa fa-close" onclick="deleteFromList(this);" style="margin-right: 0; display: none;"></i>
                            <?php else: ?>
                                <i id="stepsIcon" class="fa fa-close" onclick="deleteFromList(this);" style="margin-right: 0;"></i>
                            <?php endif ?>
                            <i id="stepsIcon" class="fas fa-arrow-down" onclick="replaceDown(this);"></i>
                            <i id="stepsIcon" class="fas fa-arrow-up" onclick="replaceUp(this);"></i><br>
                            <label>Zdjęcie <span class="asterisk">*</span></label>
                            <input name="image_{{ $step->step }}" id="image_{{ $step->step }}" class="imageToUpload"  type="file" accept=".jpeg, .jpg, .png, .gif, .svg" onchange="loadPreview(this);" required>
                            <div class="imageInput">
                                <div style="height: 100%; display: table-cell;">
                                    <a id="imageButton_{{ $step->step }}" class="imageButton" onclick="imageInput(this);">Przeglądaj...</a>
                                </div>
                                <span id="fileName_{{ $step->step }}" class="fileName">Nie wybrano pliku.</span>
                            </div>  
                            <img id="imagePreview_{{ $step->step }}" src="/tutorialsIMG/{{ $step->picture }}" class="previewImg"/><br>
                            <label>Opis <span class="asterisk">*</span></label>
                            <textarea name="description_{{ $step->step }}" class="inputText" type="text" maxlength="1000" required>{{ $step->description }}</textarea>
                        </li>
                    @endforeach
                </ol>
            </div>
            <button id ="stepsButton" class="buttonAdd" type="button" onclick="addToList(this);"><i id="plus" class="fa fa-plus" style="color: white;"></i></button><br>
			<button type="submit" class="buttonStyle" style="margin: 30px auto 0px auto;" onclick="inputRequired()">Zapisz</button>
		</div>
    </form>
    @endisset
    <script>
        window.onload = function() {
            clearInputs(); 
        };
    </script>
@endsection
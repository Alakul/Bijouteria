@extends('layouts.app')
@section('content')
    @isset($tutorials, $materials, $tools, $steps, $categories)
    @if(session()->has('success'))
        <div class=" alertSuccess">
            {{ session()->get('success') }}
        </div>
    @endif
	<form method="POST" action="{{ route('updateTutorial', ['id'=> $tutorials->id]) }}" class="formStyle" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h2 class="headline">Edytuj poradnik</h2>
		<div class="inputArea">
            <br>
            <label>Tytuł <span class="asterisk">*</span></label>
			<input name="title" class="inputText" type="text" minlength="3" maxlength="100" required value="{{ $tutorials->title }}">
                
            <label>Opis</label>
            <textarea name="description_0" class="inputText" type="text" maxlength="900">{{ $tutorials->description }}</textarea>
                
            <label>Zdjęcie tytułowe <span class="asterisk">*</span></label>
            <input name="image_0" id="image_0" class="imageToUpload" type="file" onchange="loadPreview(this);">
            <div class="imageInput">
                <div style="height: 100%; display: table-cell;">
                    <a id="imageButton_0" class="buttonStyle buttons" style="margin: 0;" onclick="imageInput(this);">Przeglądaj...</a>
                </div>
                <span id="fileName_0" class="fileName" >Nie wybrano pliku.</span>
            </div>
            <img id="imagePreview_0" src="/storage/tutorialsIMG/{{ $tutorials->title_picture }}" class="previewImg"/>

            <label for="category" style="margin-top: 16px;">Kategoria <span class="asterisk">*</span></label>
            <select name="category" id="category" required>
                @foreach ($categories as $category)
                    @if ($category->category==$tutorials->category)
                        <option value="{{ $category->category }}" selected>{{ ucfirst(trans($category->category)) }}</option>
                    @else
                        <option value="{{ $category->category }}">{{ ucfirst(trans($category->category)) }}</option>
                    @endif
                @endforeach
            </select>

            <label class="margin">Wymagane materiały <span class="asterisk">*</span></label>
            <ul id="materialsList">
                @foreach ($materials as $indexKey => $material)
                    <?php $indexKey++; ?>
                    <li><input name="material_<?php echo $indexKey; ?>" class="inputText materialsInput" type="text" maxlength="100" required style="margin-bottom: 0; width: 100%;" value="{{ $material->material}}"></li>
                    <?php $materials_length=$indexKey ?>
                @endforeach
            </ul>
            <input type="hidden" name="materials_length" value="<?php echo $materials_length; ?>">

            <label class="margin">Wymagane narzędzia <span class="asterisk">*</span></label>
            <ul id="toolsList">
                @foreach ($tools as $indexKey => $tool)
                    <?php $indexKey++; ?>
                    <li><input name="tool_<?php echo $indexKey; ?>" class="inputText toolsInput" type="text" maxlength="100" required style="margin-bottom: 0; width: 100%;" value="{{ $tool->tool}}"></li>
                    <?php $tools_length=$indexKey ?>
                @endforeach
            </ul>
            <input type="hidden" name="tools_length" value="<?php echo $tools_length; ?>">

            <label class="margin">Poradnik</label>
            <div>
                <ol id="stepsList">
                    @foreach ($steps as $indexKey => $step)
                        <?php $indexKey++; ?>
                        <li id="step_{{ $step->step }}" class="steps">
                            <h3 id="h3_{{ $step->step }}">Krok {{ $step->step }}:</h3>
                            <i style="display: none;"></i>
                            <i style="display: none;"></i>
                            <i style="display: none;"></i><br>
                            <label>Zdjęcie <span class="asterisk">*</span></label>
                            <input name="image_{{ $step->step }}" id="image_{{ $step->step }}" class="imageToUpload"  type="file" accept=".jpeg, .jpg, .png, .gif, .svg" onchange="loadPreview(this);">
                            <div class="imageInput">
                                <div style="height: 100%; display: table-cell;">
                                    <a id="imageButton_{{ $step->step }}" class="buttonStyle buttons" style="margin: 0;" onclick="imageInput(this);">Przeglądaj...</a>
                                </div>
                                <span id="fileName_{{ $step->step }}" class="fileName">Nie wybrano pliku.</span>
                            </div>  
                            <img id="imagePreview_{{ $step->step }}" src="/storage/tutorialsIMG/{{ $step->picture }}" class="previewImg"/><br>
                            <label>Opis <span class="asterisk">*</span></label>
                            <textarea name="description_{{ $step->step }}" class="inputText" type="text" maxlength="900" required>{{ $step->description }}</textarea>
                        </li>
                        <?php $steps_length=$indexKey ?>
                    @endforeach
                </ol>
            </div>
            <input type="hidden" name="steps_length" value="<?php echo $steps_length; ?>">
			<button type="submit" class="buttonStyle buttonSubmit" style="margin-top: 50px;" onclick="inputRequired()">Zapisz</button>
		</div>
    </form>
    @endisset
@endsection
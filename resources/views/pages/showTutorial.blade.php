@extends('layouts.app')
@section('content')
    @isset ($tutorials, $materials, $tools, $steps)
    <div class="formStyle">
		<h2>{{ $tutorials->title }}</h2>
		<div class="inputArea">
            
            <img id="imgShow" class="imgShow" src="/images/{{ $tutorials->title_picture }}">
            <p id="descriptionShow">{{ $tutorials->description }}</p>

            <label id="categoryLabel">Kategoria:</label>
            <p id="categoryShow">{{ $tutorials->category }}</p><br>

            <label>Wymagane materiały:</label>
            <ul id="materialsListShow" class="listShow">
                @foreach ($materials as $material)
                    <li>{{ $material->material}}</li>
                @endforeach
            </ul>
            
            <label>Wymagane narzędzia:</label>
            <ul id="toolsListShow" class="listShow">
                @foreach ($tools as $tool)
                    <li>{{ $tool->tool}}</li>
                @endforeach
            </ul>
           
            <div id="stepShow">
                <ul id="stepsList">
                    @foreach ($steps as $step)
                        <li id="steps">
                            <h3>Krok {{ $step->step}}:</h3><br>
                            <img id="imgStepShow" class="imgShow" src="/images/{{ $step->picture }}">
                            <p id="descriptionStepShow">{{ $step->description}}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
		</div>
    </div>
    @endisset
@endsection
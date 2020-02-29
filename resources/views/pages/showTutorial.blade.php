@extends('layouts.app')
@section('content')
    <div class="formStyle">
		<h2>Naszyjnik księżyc</h2>
		<div class="inputArea">
            
            <img id="imgShow">
            <p id="descriptionShow">Naszyjnik wykonany metodą makrama ze sznurka grubość 1mm oraz czarnymi koralikami. Idealny na prezent.</p>

            <label id="categoryLabel">Kategoria:</label>
            <p id="categoryShow">Naszyjniki</p></br>

            <label>Wymagane materiały:</label>
            <ul id="materialsListShow" class="listShow">
                <li>Bla Bla</li>
                <li>Bla Bla</li>
            </ul>
            
            <label>Wymagane narzędzia:</label>
            <ul id="toolsListShow" class="listShow">
                <li>Bla</li>
            </ul>
           
            <div>
                <ul id="stepsList">
                    <li id="steps">
                        <h3>Krok 1:</h3></br>
                        <img id="imgStepShow">
                        <p id="descriptionStepShow">Utnij 2 metry sznurka razy 2 a następnie złóż w połowie. Wykonaj węzeł beczka.</p>
                    </li>
                </ul>
            </div>
		</div>
    </div>
@endsection
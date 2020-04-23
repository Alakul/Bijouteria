@extends('layouts.app')
@section('content')
    @isset ($profiles)
    @if(session()->has('success'))
        <div class=" alertSuccess">
            {{ session()->get('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('updateProfile') }}" class="formStyle" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h2 class="headline">Edytuj profil</h2>
        <div class="inputArea">
            <br>
            <label>Zdjęcie</label>
            <input name="avatar" id="avatar" class="imageToUpload" type="file" onchange="loadPreview(this);">
            <div id="avatarInput" id="avatarInput" class="imageInput">
                <div style="height: 100%; display: table-cell;">
                    <a id="avatarButton" class="buttonStyle buttons" style="margin: 0;" onclick="imageInput(this);">Przeglądaj...</a>
                </div>
                <span id="avatarName" class="fileName">Nie wybrano pliku.</span>
            </div>  
            <img id="avatarPreview" src="/storage/avatarsIMG/{{ $profiles->avatar }}" class="previewImg"/><br>

            <label>Informacje o Twoim profilu</label>
            <textarea name="info" class="inputText" type="text" maxlength="300">{{ $profiles->info}}</textarea>

            <button type="submit" class="buttonStyle buttonSubmit">Zapisz</button>
        </div>
    </form>
    @endisset
@endsection
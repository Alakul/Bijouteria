@extends('layouts.app')
@section('content')
    @isset ($profiles)
    <form method="POST" action="{{ route('editProfile') }}" class="formStyle" enctype="multipart/form-data">
        {{csrf_field()}}
        <h2 class="headline">Edytuj profil</h2>
        <div class="inputArea"> 
            <br>
            <label>Zdjęcie</label><br>
            <input name="avatar" id="avatar" class="imageToUpload" type="file" onchange="loadPreview(this);">
            <div id="avatarInput" id="avatarInput" class="imageInput">
                <div style="height: 100%; display: table-cell;">
                    <a id="avatarButton" class="imageButton" onclick="imageInput(this);">Przeglądaj...</a>
                </div>
                <span id="avatarName" class="fileName">Nie wybrano pliku.</span>
            </div>  
            <img id="avatarPreview" src="/avatarsIMG/{{ $profiles->avatar }}" class="previewImg"/><br>

            <label>Informacje o Twoim profilu</label><br>
            <textarea name="info" class="inputText" type="text" maxlength="1000">{{ $profiles->info}}</textarea><br>

            <button type="submit" class="buttonStyle" style="margin: 30px auto auto auto;">Zapisz</button>
        </div>
    </form>
    @endisset
@endsection
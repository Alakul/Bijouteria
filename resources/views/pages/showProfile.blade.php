@extends('layouts.app')
@section('content')
    @isset($tutorials, $users, $profiles)
    <div id="" class="formStyle" style="height: 120px;">
    <img style="height: 120px; width: 120px; float: left;" src="/avatars/{{ $profiles->avatar }}"/>
        <div style="width: 25%; height: 100%; float: right;">
            <a style="margin: auto;" href="" class="buttonStyle">Obserwuj</a>
        </div>
        <div style="float: right; width: 50%; height: 100%;"> 
            <p id="userLogin">{{ $users->name }}</p>
            <p>{{ $profiles->info }}</p>
        </div>
    </div>

    <div class="gallery galleryColumns">
    @foreach ($tutorials as $tutorial)
        <div class="miniature">
            <a id="buttonMiniature" class="buttonStyle"><i class="fas fa-heart" style="color: white;"></i></a>
            <a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">
                <img class="imgMiniature" src="/tutorials/{{ $tutorial->title_picture }}"/>
            </a>
        </div>
    @endforeach
    </div>
    @endisset
@endsection
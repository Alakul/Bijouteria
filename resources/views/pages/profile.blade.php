@extends('layouts.app')
@section('content')
    {{csrf_field()}}
    @isset($profiles)
        <div class="show">
            <div id="profile" class="formStyle">
                <div class="showColumn">
                    <img class="profileImg" src="/avatarsIMG/{{ $profiles->avatar }}"/>
                </div>
                <div id="profileContent" class="showColumn">
                    <p id="userLogin">{{ Auth::user()->name }}</p>
                    <p style="font-size: 14px;">{{ $profiles->info }}</p>
                </div>
                <div class="showColumn" style="vertical-align: middle;">
                    <a href="{{ route('editProfile', ['id' => auth()->id()]) }}" class="buttonStyle">Edytuj profil</a>
                </div>
            </div>
        </div>
        <div class="gallery galleryColumns">
        @foreach ($tutorials as $tutorial)
            <div class="miniature">
                <a class="buttonStyle miniatureButton" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('deleteTutorial', ['id' => $tutorial->id]) }}"><i class="fa fa-close" style="color: white;"></i></a>
                <a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">
                    <img class="miniatureImg" src="/tutorialsIMG/{{ $tutorial->title_picture }}"/>
                </a>
            </div>
        @endforeach
        </div>
    @endisset
@endsection
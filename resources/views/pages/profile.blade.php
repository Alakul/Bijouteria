@extends('layouts.app')
@section('content')
    {{csrf_field()}}
    @isset($profiles)
        <div class="formStyle" style="max-width: 600px; display: table;">
            <div class="showColumn">
                <img class="profileImg" src="/avatarsIMG/{{ $profiles->avatar }}"/>
            </div>
            <div class="showColumn" style="vertical-align: top; padding: 0 20px 0 20px;">
                <p id="userLogin">{{ Auth::user()->name }}</p>
                <p>{{ $profiles->info }}dd bla bla to nie jest to bla bla nananana</p>
            </div>
            <div class="showColumn" style="vertical-align: middle;">
                <a href="{{ route('editProfile', ['id' => auth()->id()]) }}" class="buttonStyle">Edytuj profil</a>
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
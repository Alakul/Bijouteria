@extends('layouts.app')
@section('content')
    @isset($tutorials, $users, $profiles)
    <div class="show">
        @auth
            @if ($users->id!=Auth::user()->id)
                <a id="back"class="showColumn" href="{{ URL::previous() }}"><i id="backIcon" class="fa fa-arrow-left"></i></a>
            @endif
        @endauth
        <div id="profile" class="formStyle">
            <div class="showColumn">
                <img class="profileImg" src="/avatarsIMG/{{ $profiles->avatar }}"/>
            </div>
            <div class="showColumn" style="vertical-align: top; padding: 0 20px 0 20px;">
                <p id="userLogin">{{ $users->name }}</p>
                <p style="font-size: 14px;">{{ $profiles->info }}</p>
            </div>
            @auth
                @if ($users->id==Auth::user()->id)
                    <div class="showColumn" style="vertical-align: middle;">
                        <a href="{{ route('showEditProfile', ['id' => auth()->id()]) }}" class="buttonStyle">Edytuj profil</a>
                    </div>
                @endif
            @endauth
        </div>
    </div>
    <div class="gallery galleryColumns">
        @foreach ($tutorials as $tutorial)
            <div class="miniature">
                @auth
                    @if ($tutorial->user_id==Auth::user()->id)
                        <a class="buttonStyle miniatureButton" href="{{ route('showEditTutorial', ['id' => $tutorial->id]) }}"><i class="fa fa-edit" style="color: white;"></i></a>
                        <a class="buttonStyle miniatureButton" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('deleteTutorial', ['id' => $tutorial->id]) }}" style="right: 0;"><i class="fa fa-close" style="color: white;"></i></a>
                    @else
                        <a class="buttonStyle miniatureButton"><i class="fas fa-heart" style="color: white;"></i></a>
                    @endif
                @endauth
                <a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">
                    <img class="miniatureImg" src="/tutorialsIMG/{{ $tutorial->title_picture }}"/>
                </a>
            </div>
        @endforeach
    </div>
    @endisset
@endsection
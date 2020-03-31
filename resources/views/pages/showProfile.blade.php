@extends('layouts.app')
@section('content')
    @isset($tutorials, $users, $profiles)
    <div class="show">
        <a id="back"class="showColumn" href="{{ URL::previous() }}"><i id="backIcon" class="fa fa-arrow-left"></i></a>
        <div class="formStyle" style="max-width: 600px; display: table; padding: 20px;">
            <div class="showColumn">
                <img class="profileImg" src="/avatarsIMG/{{ $profiles->avatar }}"/>
            </div>
            <div class="showColumn" style="vertical-align: top; padding: 0 20px 0 20px;">
                <p id="userLogin">{{ $users->name }}</p>
                <p>{{ $profiles->info }}dd bla bla to nie jest to bla bla nananana</p>
            </div>
        </div>
    </div>
    <div class="gallery galleryColumns">
        @foreach ($tutorials as $tutorial)
            <div class="miniature">
                @auth
                    <a class="buttonStyle miniatureButton"><i class="fas fa-heart" style="color: white;"></i></a>
                @endauth
                <a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">
                    <img class="miniatureImg" src="/tutorialsIMG/{{ $tutorial->title_picture }}"/>
                </a>
            </div>
        @endforeach
    </div>
    @endisset
@endsection
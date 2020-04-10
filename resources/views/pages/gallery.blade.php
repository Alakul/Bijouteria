@extends('layouts.app')
@section('content')
    <div class="gallery galleryColumns">
    @foreach ($tutorials as $tutorial)
        <div class="miniature">
            @auth
                <a class="buttonStyle miniatureButton" style="right: 0;"><i class="fas fa-heart" style="color: white;"></i></a>
                <p class="miniatureButton">{{ $tutorial->title}}</p>
            @endauth
            <a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">
                <img class="miniatureImg" src="/storage/tutorialsIMG/{{ $tutorial->title_picture }}"/>
            </a>
        </div>
    @endforeach
	</div>
@endsection

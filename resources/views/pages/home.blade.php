@extends('layouts.app')
@section('content')
    <div class="gallery galleryColumns">
    @foreach ($tutorials as $tutorial)
        <div class="miniature">
            @auth
                <a class="buttonStyle miniatureButton" style="right: 0;"><i class="fas fa-heart" style="color: white;"></i></a>
                <p class="miniatureButton" style="background-color: white; bottom: 0; font-weight: bold; color: black; padding: 12px; border-radius: 4px;">{{ Str::limit($tutorial->title, 28) }}</p>
            @endauth
            <a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">
                <img class="miniatureImg" src="/tutorialsIMG/{{ $tutorial->title_picture }}"/>
            </a>
        </div>
    @endforeach
	</div>
@endsection

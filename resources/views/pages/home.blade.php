@extends('layouts.app')
@section('content')

    <div class="gallery galleryColumns">
    @foreach ($tutorials as $tutorial)
        <div class="miniature">
            <a id="buttonMiniature" class="buttonStyle"><i class="fas fa-heart" style="color: white;"></i></a>
            <a href="{{ route('show', ['id' => $tutorial->id]) }}">
                <img class="imgMiniature" src="/images/{{ $tutorial->title_picture }}"/>
            </a>
        </div>
    @endforeach
	</div>

@endsection

@extends('layouts.app')
@section('content')

    <div class="gallery galleryColumns">
	@foreach ($tutorials as $tutorial)
        <a class="miniature" href="{{ route('show', ['id' => $tutorial->id]) }}">
            <p class="titleMiniature">{{ $tutorial->title }}</p>
            <img class="imgMiniature" src="/images/{{ $tutorial->title_picture }}"/>
		</a>
    @endforeach
	</div>

@endsection

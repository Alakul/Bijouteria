@extends('layouts.app')
@section('content')
    {{ csrf_field() }}

    <div style="height: 300px; border: solid 2px;">
    nic
    </div>

    <div class="gallery galleryColumns">
	@foreach ($tutorials as $tutorial)
        <a class="miniature" href="{{ route('show', ['id' => $tutorial->id]) }}">
            <p class="titleMiniature">{{ $tutorial->title }}</p>
            <img class="imgMiniature" src="/images/{{ $tutorial->title_picture }}"/>
		</a>
    @endforeach
	</div>

@endsection
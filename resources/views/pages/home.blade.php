@extends('layouts.app')
@section('content')
    @foreach ($tutorials as $tutorial)
        <a href="{{ route('show', ['id' => $tutorial->id]) }}">
            <div id ="miniature">
                <p id="authorMiniature"><img id="authorImgMiniature">{{ $tutorial->name }}</p>
                <img id="imgMiniature" src="/images/{{ $tutorial->title_picture }}">
                <p id="titleMiniature">{{ $tutorial->title }}</p>
            </div>
        </a>
    @endforeach
@endsection

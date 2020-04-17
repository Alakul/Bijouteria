@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class=" alertSuccess">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="gallery">
        @foreach ($tutorials as $tutorial)
            <div class="miniature">
                <div class="miniatureInner">
                    <a class="buttonStyle miniatureButton" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyFavourite', ['id' => $tutorial->id]) }}" style="right: 0;"><i class="fa fa-close" style="color: white;"></i></a>
                    <p class="miniatureButton" style="background-color: white; bottom: 0; font-size: 12px; font-weight: bold; color: black; padding: 12px; border-radius: 4px;">{{ Str::limit($tutorial->title, 28) }}</p>
                    <a href="{{ route('showTutorial', ['id' => $tutorial->tutorial_id]) }}">
                        <img class="miniatureImg" src="/storage/tutorialsIMG/{{ $tutorial->title_picture }}"/>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $tutorials->links('vendor.pagination.pagination') }}
@endsection
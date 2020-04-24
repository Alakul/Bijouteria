@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class=" alertDatabase">
            {{ session()->get('success') }}
        </div>
    @endif
    @if ($tutorials->isEmpty())
        <div class="alertDatabase">Brak rekordów</div>
    @endif
    <div class="gallery">
        @foreach ($tutorials as $tutorial)
            <div class="miniature">
                <div class="miniatureInner">
                    <a class="miniatureButton" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyFavourite', ['id' => $tutorial->id]) }}" style="right: 0;"><i class="fa fa-close" style="font-size: 15px;"></i></a>
                    <p class="miniatureTitle">{{ Str::limit($tutorial->title, 50) }}</p>
                    <a href="{{ route('showTutorial', ['id' => $tutorial->tutorial_id]) }}">
                        <div class="miniatureImg" style="background-image: url('/storage/tutorialsIMG/{{ $tutorial->title_picture }}')"></div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $tutorials->links('vendor.pagination.pagination') }}
@endsection
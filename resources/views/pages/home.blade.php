@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class="alertDatabase">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('fail'))
        <div class="alertDatabase">
            {{ session()->get('fail') }}
        </div>
    @endif
    @if ($tutorials->isEmpty())
        <div class="alertDatabase">Brak rekordów</div>
    @endif
    <div class="gallery">
        @foreach ($tutorials as $tutorial)
            <div class="miniature">
                <div class="miniatureInner">
                    @if (Auth::guard('admin')->check())
                        <a class="miniatureButton" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyTutorial', ['id' => $tutorial->id]) }}"><i class="fa fa-close" style="font-size: 15px;"></i></a>
                    @elseif (Auth::check())
                        @if ($tutorial->user_id==Auth::user()->id)
                            <a class="miniatureButton" href="{{ route('editTutorial', ['id' => $tutorial->id]) }}" style="right: 38px;"><i class="fa fa-edit"></i></a>
                            <a class="miniatureButton" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyTutorial', ['id' => $tutorial->id]) }}"><i class="fa fa-close" style="font-size: 15px;"></i></a>
                        @else
                            <a class="miniatureButton"  href="{{ route('addFavourite', ['id' => $tutorial->id]) }}"><i class="fas fa-heart"></i></a>  
                        @endif
                    @endif
                    <p class="miniatureTitle">{{ Str::limit($tutorial->title, 50) }}</p>
                    <a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">
                        <div class="miniatureImg" style="background-image: url('/storage/tutorialsIMG/{{ $tutorial->title_picture }}')"></div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $tutorials->links('vendor.pagination.pagination') }}
@endsection
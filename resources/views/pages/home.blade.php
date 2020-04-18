@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class=" alertSuccess">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('fail'))
        <div class=" alertSuccess">
            {{ session()->get('fail') }}
        </div>
    @endif
    <div class="gallery">
        @foreach ($tutorials as $tutorial)
            <div class="miniature">
                <div class="miniatureInner">
                    @if (Auth::guard('admin')->check())
                        <a class="buttonStyle miniatureButton" href="{{ route('editTutorial', ['id' => $tutorial->id]) }}"><i class="fa fa-edit" style="color: white;"></i></a>
                        <a class="buttonStyle miniatureButton" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyTutorial', ['id' => $tutorial->id]) }}" style="right: 0;"><i class="fa fa-close" style="color: white;"></i></a>
                    @elseif (Auth::check())
                        @if ($tutorial->user_id==Auth::user()->id)
                            <a class="buttonStyle miniatureButton" href="{{ route('editTutorial', ['id' => $tutorial->id]) }}"><i class="fa fa-edit" style="color: white;"></i></a>
                            <a class="buttonStyle miniatureButton" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyTutorial', ['id' => $tutorial->id]) }}" style="right: 0;"><i class="fa fa-close" style="color: white;"></i></a>
                        @else
                            <a class="buttonStyle miniatureButton"  href="{{ route('addFavourite', ['id' => $tutorial->id]) }}" style="right: 0;"><i class="fas fa-heart" style="color: white;"></i></a>  
                        @endif
                    @endif

                    <p class="miniatureButton" style="background-color: white; bottom: 0; font-size: 12px; font-weight: bold; color: black; padding: 12px; border-radius: 4px;">{{ Str::limit($tutorial->title, 28) }}</p>
                    <a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">
                        <img class="miniatureImg" src="/storage/tutorialsIMG/{{ $tutorial->title_picture }}"/>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $tutorials->links('vendor.pagination.pagination') }}
@endsection
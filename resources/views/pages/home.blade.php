@extends('layouts.app')
@section('content')
    <div class="gallery galleryColumns">
    @foreach ($tutorials as $tutorial)
        <div class="miniature">
            @auth
                @if ($tutorial->user_id==Auth::user()->id)
                    <a class="buttonStyle miniatureButton" href="{{ route('showEditTutorial', ['id' => $tutorial->id]) }}"><i class="fa fa-edit" style="color: white;"></i></a>
                    <a class="buttonStyle miniatureButton" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('deleteTutorial', ['id' => $tutorial->id]) }}" style="right: 0;"><i class="fa fa-close" style="color: white;"></i></a>
                @else
                    <a class="buttonStyle miniatureButton" style="right: 0;"><i class="fas fa-heart" style="color: white;"></i></a>  
                @endif
            @endauth
            <p class="miniatureButton" style="background-color: white; bottom: 0; font-weight: bold; color: black; padding: 12px; border-radius: 4px;">{{ Str::limit($tutorial->title, 28) }}</p>
            <a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">
                <img class="miniatureImg" src="/storage/tutorialsIMG/{{ $tutorial->title_picture }}"/>
            </a>
        </div>
    @endforeach
	</div>
@endsection
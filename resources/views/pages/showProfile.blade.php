@extends('layouts.app')
@section('content')
    @isset( $tutorials, $users)
    <div id="" class="formStyle" style="height: 120px;">
    <img style="height: 120px; width: 120px; float: left;" src="https://image.ceneostatic.pl/data/products/40255890/i-evanescence-fallen-cd.jpg"/>
        <div style="width: 25%; height: 100%; float: right;">
            <a style="margin: auto;" href="{{ route('editProfile') }}" class="buttonStyle">Obserwuj</a>
        </div>
        <div style="float: right; width: 50%; height: 100%;"> 
            <p id="userLogin">{{ $users->name }}</p>
            <p>opis</p>
        </div>
    </div>

    <div class="gallery galleryColumns">
    @foreach ($tutorials as $tutorial)
        <div class="miniature">
            <a id="buttonMiniature" class="buttonStyle"><i class="fas fa-heart" style="color: white;"></i></a>
            <a href="{{ route('show', ['id' => $tutorial->id]) }}">
                <img class="imgMiniature" src="/tutorials/{{ $tutorial->title_picture }}"/>
            </a>
        </div>
    @endforeach
    </div>
    @endisset
@endsection
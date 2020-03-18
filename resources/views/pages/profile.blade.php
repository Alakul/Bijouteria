@extends('layouts.app')
@section('content')
    {{ csrf_field() }}

    <div id="" class="formStyle" style="height: 120px;">
    <img style="height: 120px; width: 120px; float: left;" src="https://image.ceneostatic.pl/data/products/40255890/i-evanescence-fallen-cd.jpg"/>
        <div style="width: 25%; height: 100%; float: right;">
            <a style="margin: auto;" href="{{ route('editProfile') }}" class="buttonStyle">Edytuj profil</a>
        </div>
        <div style="float: right; width: 50%; height: 100%;"> 
            <p id="userLogin">{{ Auth::user()->name }}</p>
            <p>opis</p>
        </div>
    </div>

    <div class="gallery galleryColumns">
	@foreach ($tutorials as $tutorial)
        <a class="miniature" href="{{ route('show', ['id' => $tutorial->id]) }}">
            <img class="imgMiniature" src="/images/{{ $tutorial->title_picture }}"/>
		</a>
    @endforeach
	</div>

@endsection
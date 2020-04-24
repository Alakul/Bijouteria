@extends('layouts.app')
@section('content')
    @isset($tutorials, $users, $profiles)
    @if(session()->has('success'))
        <div class=" alertDatabase">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="show">
        <div class="profile">
            <div class="showColumn">
                <img class="profileImg" src="/storage/avatarsIMG/{{ $profiles->avatar }}"/>
            </div>
            <div class="showColumn profileContent">
                <p id="userLogin">{{ $users->name }}</p>
                <p style="font-size: 14px;">{{ $profiles->info }}</p>
            </div>
            @auth
                @if ($users->id==Auth::user()->id)
                    <a href="{{ route('editProfile', ['id' => auth()->id()]) }}" class="buttons buttonStyle"><i class="fas fa-edit"></i><p class="buttonText">Edytuj profil</p></a> 
                @endif
            @endauth
        </div>
    </div>

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
    @endisset
@endsection
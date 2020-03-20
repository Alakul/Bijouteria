@extends('layouts.app')
@section('content')
    @isset($tutorials, $users, $profiles)
    <table class="formStyle">
        <tr>
            <td style="width: 20%;"><img class="profileImg" src="/avatarsIMG/{{ $profiles->avatar }}"/></td>
            <td style="float: left;">
                <p id="userLogin">{{ $users->name }}</p>
                <p>{{ $profiles->info }}</p>
            </td>
            <td><a href="{{ route('editProfile', ['id' => auth()->id()]) }}" class="buttonStyle" style="float: right;">Obserwuj</a></td>
        </tr>
    </table>

    <div class="gallery galleryColumns">
    @foreach ($tutorials as $tutorial)
        <div class="miniature">
            <a class="buttonStyle miniatureButton"><i class="fas fa-heart" style="color: white;"></i></a>
            <a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">
                <img class="miniatureImg" src="/tutorialsIMG/{{ $tutorial->title_picture }}"/>
            </a>
        </div>
    @endforeach
    </div>
    @endisset
@endsection
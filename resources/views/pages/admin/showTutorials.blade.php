@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class=" alertDatabase">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('fail'))
        <div class=" alertDatabase">
            {{ session()->get('fail') }}
        </div>
    @endif
    <div class="adminContainer">
        <table class="adminTable">
            <tr>
                <th>ID</th>
                <th>nazwa uzytkownika</th>
                <th>tytuł</th>
                <th>kategoria</th>
                <th>data opublikowania</th>
                <th>Akcja</th>
            </tr>
            @foreach ($tutorials as $tutorial)
                <tr>
                    <td>{{ $tutorial->id }}</td>
                    <td><a href="{{ route('showProfile', ['id' => $tutorial->user_id]) }}">{{ $tutorial->name }}</a></td>
                    <td><a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">{{ $tutorial->title }}</a></td>
                    <td>{{ $tutorial->category }}</td>
                    <td>{{ $tutorial->date }}</td>
                    <td style="width: 100px;"><a class="buttons buttonStyle" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyTutorialAdmin', ['id' => $tutorial->id]) }}" style=" display: block; margin: 0;"><i class="fa fa-close"></i><p class="buttonText">Usuń</p></a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
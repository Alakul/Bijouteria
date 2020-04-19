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
    <table class="adminTable">
        <tr>
            <th>ID</th>
            <th>nazwa uzytkownika</th>
            <th>tytuł</th>
            <th>kategoria</th>
            <th>opis</th>
            <th>data opublikowania</th>
        </tr>
        @foreach ($tutorials as $tutorial)
            <tr>
                <td>{{ $tutorial->id }}</td>
                <td><a href="{{ route('showProfile', ['id' => $tutorial->user_id]) }}">{{ $tutorial->name }}</a></td>
                <td><a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">{{ $tutorial->title }}</a></td>
                <td>{{ $tutorial->category }}</td>
                <td>{{ $tutorial->description }}</td>
                <td>{{ $tutorial->date }}</td>
                <td><a onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyTutorialAdmin', ['id' => $tutorial->id]) }}" style="right: 0;"><i class="fa fa-close"></i>Edytuj</a></td>
                <td><a onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyTutorialAdmin', ['id' => $tutorial->id]) }}" style="right: 0;"><i class="fa fa-close"></i>Usuń</a></td>
            </tr>
        @endforeach
    </table>
@endsection
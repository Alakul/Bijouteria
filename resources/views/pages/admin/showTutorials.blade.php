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
                <th>Nazwa użytkownika</th>
                <th>Tytuł</th>
                <th>Kategoria</th>
                <th>Data opublikowania</th>
                <th>Akcja</th>
            </tr>
            @foreach ($tutorials as $tutorial)
                <tr>
                    <td>{{ $tutorial->id }}</td>
                    <td><a href="{{ route('showProfile', ['id' => $tutorial->user_id]) }}">{{ $tutorial->name }}</a></td>
                    <td><a href="{{ route('showTutorial', ['id' => $tutorial->id]) }}">{{ $tutorial->title }}</a></td>
                    <td>{{ $tutorial->category }}</td>
                    <td>{{ $tutorial->date }}</td>
                    <td style="width: 100px;"><a class="buttonStyle buttonSubmit" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyTutorialAdmin', ['id' => $tutorial->id]) }}" style="box-sizing: border-box; text-align: center; margin: 0;"><i class="fa fa-close" style="color: white;"></i><p class="buttonText">Usuń</p></a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
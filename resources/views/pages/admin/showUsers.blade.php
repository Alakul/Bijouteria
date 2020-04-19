@extends('layouts.app')
@section('content')
    <table class="adminTable">
        <tr>
            <th>ID</th>
            <th>nazwa uzytkownika</th>
            <th>email</th>
            <th>data utworzenia</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('showProfile', ['id' => $user->id]) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                <td><a onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyUserAdmin', ['id' => $user->id]) }}" style="right: 0;"><i class="fa fa-close"></i>Usuń</a></td>
            </tr>
        @endforeach
    </table>
@endsection
@extends('layouts.app')
@section('content')
    <div class="adminContainer">
        <table class="adminTable">
            <tr>
                <th>ID</th>
                <th>Nazwa uzytkownika</th>
                <th>Email</th>
                <th>Data utworzenia</th>
                <th>Akcja</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td><a href="{{ route('showProfile', ['id' => $user->id]) }}">{{ $user->name }}</a></td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td style="width: 100px;"><a class="buttonStyle buttonSubmit" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyUserAdmin', ['id' => $user->id]) }}" style="box-sizing: border-box; text-align: center; margin: 0;"><i class="fa fa-close" style="color: white;"></i><p class="buttonText">Usuń</p></a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
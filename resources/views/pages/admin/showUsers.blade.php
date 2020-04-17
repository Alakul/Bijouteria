@extends('layouts.app')
@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>nazwa uzytkownika</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td><a onclick="return confirm('Czy na pewno chcesz usunąć?')" href="#" style="right: 0;"><i class="fa fa-close"></i>Usuń</a></td>
            </tr>
        @endforeach
    </table>
@endsection
@extends('layouts.app')
@section('content')
    <table>
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
                <td>{{ $tutorial->name }}</td>
                <td>{{ $tutorial->title }}</td>
                <td>{{ $tutorial->category }}</td>
                <td>{{ $tutorial->description }}</td>
                <td>{{ $tutorial->date }}</td>
                <td><a onclick="return confirm('Czy na pewno chcesz usunąć?')" href="#" style="right: 0;"><i class="fa fa-close"></i>Usuń</a></td>
            </tr>
        @endforeach
    </table>
@endsection
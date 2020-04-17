@extends('layouts.app')
@section('content')
    <table>
        <tr>
            <th>ID</th>
            <th>nazwa uzytkownika</th>
            <th>ID uzytkownika</th>
            <th>Komentarz</th>
        </tr>
        @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td>{{ $comment->name }}</td>
                <td>{{ $comment->user_id }}</td>
                <td>{{ $comment->comment }}</td>
            </tr>
        @endforeach
    </table>
@endsection
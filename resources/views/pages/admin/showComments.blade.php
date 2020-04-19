@extends('layouts.app')
@section('content')
    <table class="adminTable">
        <tr>
            <th>ID</th>
            <th>nazwa uzytkownika</th>
            <th>poradnik id</th>
            <th>poradnik tytul</th>
            <th>Komentarz</th>
        </tr>
        @foreach ($comments as $comment)
            <tr>
                <td>{{ $comment->id }}</td>
                <td><a href="{{ route('showProfile', ['id' => $comment->user_id]) }}">{{ $comment->name }}</a></td>
                <td>{{ $comment->tutorial_id }}</td>
                <td><a href="{{ route('showTutorial', ['id' => $comment->tutorial_id]) }}">{{ $comment->title }}</a></td>
                <td>{{ $comment->comment }}</td>
                <td><a onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyCommentAdmin', ['id' => $comment->id]) }}" style="right: 0;"><i class="fa fa-close"></i>Usuń</a></td>
            </tr>
        @endforeach
    </table>
@endsection
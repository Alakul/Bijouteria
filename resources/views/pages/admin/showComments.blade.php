@extends('layouts.app')
@section('content')
    <div class="adminContainer">
        <table class="adminTable">
            <tr>
                <th>ID</th>
                <th>nazwa uzytkownika</th>
                <th>poradnik id</th>
                <th>poradnik tytul</th>
                <th>Komentarz</th>
                <th>Akcja</th>
            </tr>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td><a href="{{ route('showProfile', ['id' => $comment->user_id]) }}">{{ $comment->name }}</a></td>
                    <td>{{ $comment->tutorial_id }}</td>
                    <td><a href="{{ route('showTutorial', ['id' => $comment->tutorial_id]) }}">{{ $comment->title }}</a></td>
                    <td>{{ $comment->comment }}</td>
                    <td style="width: 100px;"><a class="buttons buttonStyle" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyCommentAdmin', ['id' => $comment->id]) }}" style=" display: block; margin: 0;"><i class="fa fa-close"></i><p class="buttonText">Usuń</p></a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
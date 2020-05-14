@extends('layouts.app')
@section('content')
    <div class="adminContainer">
        <table class="adminTable">
            <tr>
                <th>ID</th>
                <th>Nazwa uzytkownika</th>
                <th>ID poradnika</th>
                <th>Tytuł poradnika</th>
                <th>Komentarz</th>
                <th>Data opublikowania</th>
                <th>Akcja</th>
            </tr>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->id }}</td>
                    <td><a href="{{ route('showProfile', ['id' => $comment->user_id]) }}">{{ $comment->name }}</a></td>
                    <td>{{ $comment->tutorial_id }}</td>
                    <td><a href="{{ route('showTutorial', ['id' => $comment->tutorial_id]) }}">{{ $comment->title }}</a></td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->date }}</td>
                    <td style="width: 100px;"><a class="buttonStyle buttonSubmit" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyCommentAdmin', ['id' => $comment->id]) }}" style="box-sizing: border-box; text-align: center; margin: 0;"><i class="fa fa-close" style="color: white;"></i><p class="buttonText">Usuń</p></a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
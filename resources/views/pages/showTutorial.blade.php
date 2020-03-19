@extends('layouts.app')
@section('content')
    @isset ($tutorials, $materials, $tools, $steps, $comments, $profiles, $users)
    <div style="height: auto; background-color: yellow;">
    <div class="formStyle" sty>
		<h2>{{ $tutorials->title }}</h2>
		<div class="inputArea">
            
            <img id="imgShow" class="imgShow" src="/tutorialsIMG/{{ $tutorials->title_picture }}">
            <p id="descriptionShow">{{ $tutorials->description }}</p>

            <label id="categoryLabel">Kategoria:</label>
            <p id="categoryShow">{{ $tutorials->category }}</p><br>

            <label>Wymagane materiały:</label>
            <ul id="materialsListShow" class="listShow">
                @foreach ($materials as $material)
                    <li>{{ $material->material}}</li>
                @endforeach
            </ul>
            
            <label>Wymagane narzędzia:</label>
            <ul id="toolsListShow" class="listShow">
                @foreach ($tools as $tool)
                    <li>{{ $tool->tool}}</li>
                @endforeach
            </ul>
           
            <div id="stepShow">
                <ul id="stepsList">
                    @foreach ($steps as $step)
                        <li id="steps">
                            <h3>Krok {{ $step->step}}:</h3><br>
                            <img id="imgStepShow" class="imgShow" src="/tutorialsIMG/{{ $step->picture }}">
                            <p id="descriptionStepShow">{{ $step->description}}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
		</div>
    </div>
        <div style="float: right; background-color: red; width: 50% height: 100%;">
        <p>{{ $users->name}}</p>
        <p>{{ $profiles->info}}</p>
        <img src="/avatarsIMG/{{ $profiles->avatar }}">
        <p>data: {{ $tutorials->date}}</p>
        </div>
    </div>
    
    <div class="formStyle" style="">
        <h3 style="margin-bottom: 30px;">Komentarze</h3>
        @auth
            <form method="POST" action="{{ action('CommentController@store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <label>Napisz komentarz</label><br>
                <textarea name="comment" class="inputText" style="margin: 10px 20px 10px 20px;" type="text" maxlength="300" required></textarea>
                <button type="submit" class="buttonStyle" style="margin: 0 auto 30px auto; display: block;">Opublikuj</button>
                <input type="hidden" name="tutorial_id" value="{{ $tutorials-> id}}">
            </form>
        @endauth
        
        <table class="commentList">
            @foreach ($comments as $comment)
                <tr class="comment">
                    <td class="commentAvatar"><a href="{{ route('showProfile', ['id' => $comment->user_id]) }}"><img class="commentImg" src="/avatarsIMG/{{ $comment->avatar }}"></a></td>
                    <td class="commentText">
                        <a href="{{ route('showProfile', ['id' => $comment->user_id]) }}"><label style="margin: 0;">{{ $comment->name }}</label></a><br>
                        <p style="color: gray;">{{ $comment->date }}</p>
                        <p style="font-size: 16px;">{{ $comment->comment }}</p>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @endisset
@endsection
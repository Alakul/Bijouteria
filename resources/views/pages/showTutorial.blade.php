@extends('layouts.app')
@section('content')
    @isset ($tutorials, $materials, $tools, $steps, $comments, $profiles, $users)
    <div class="show">
        <div class="showColumn">
            <div class="formStyle">
                <h2 class="headline">{{ $tutorials->title }}</h2>
                <div class="inputArea">
                    
                    <img class="showImg" src="/tutorialsIMG/{{ $tutorials->title_picture }}">
                    <p class="showDescription">{{ $tutorials->description }}</p>

                    <label id="categoryLabel">Kategoria:</label>
                    <p class="showCategory">{{ $tutorials->category }}</p><br>

                    <label>Wymagane materiały:</label>
                    <ul id="materialsListShow" class="showList">
                        @foreach ($materials as $material)
                            <li>{{ $material->material}}</li>
                        @endforeach
                    </ul>
                    
                    <label>Wymagane narzędzia:</label>
                    <ul id="toolsListShow" class="showList">
                        @foreach ($tools as $tool)
                            <li>{{ $tool->tool}}</li>
                        @endforeach
                    </ul>
                
                    <div id="stepShow">
                        <ul id="stepsList">
                            @foreach ($steps as $step)
                                <li class="showSteps">
                                    <h3>Krok {{ $step->step}}:</h3><br>
                                    <img id="imgStepShow" class="showImg" src="/tutorialsIMG/{{ $step->picture }}">
                                    <p class="showDescriptionStep">{{ $step->description}}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="showColumn">
            <div class="formStyle">
                <div class="showColumn" style="background-color: pink;">
                <a href="{{ route('showProfile', ['id' => $profiles->user_id]) }}"><img width="100px" height="100px" style="border-radius: 4px; object-fit: cover;" src="/avatarsIMG/{{ $profiles->avatar }}"></a>
                </div>
                <div class="showColumn" style="background-color: red; width: 100%; vertical-align: top; padding: 0 10px 0 10px;">
                    <a href="{{ route('showProfile', ['id' => $profiles->user_id]) }}"><p id="userLogin" style="margin: 0;">{{ $users->name }}</p></a><br>
                </div>
                <p>data: {{ $tutorials->date}}</p>
                <a class="buttonStyle"><p style="display: inline-block; margin: 0 6px 0 0;">Dodaj do ulubionych</p><i class="fas fa-heart" style="color: white; margin-left: 6px;"></i></a>
            </div>
            
        </div>
    </div>

    <div class="formStyle" style="">
        <h3 style="margin-bottom: 30px;">Komentarze</h3>
        @auth
            <form method="POST" action="{{ action('CommentController@store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <label>Napisz komentarz</label><br>
                <textarea name="comment" class="inputText" type="text" maxlength="300" required style="margin-bottom: 8px;"></textarea>
                <button type="submit" class="buttonStyle" style="margin: 0 auto 40px auto;">Opublikuj</button>
                <input type="hidden" name="tutorial_id" value="{{ $tutorials-> id}}">
            </form>
        @endauth
        
        <ul class="commentList">
            @foreach ($comments as $comment)
                <li class="comment">
                    <div class="commentAvatar">
                        <a href="{{ route('showProfile', ['id' => $comment->user_id]) }}"><img class="commentImg" src="/avatarsIMG/{{ $comment->avatar }}"></a>
                    </div>
                    <div class="commentContent">
                        <a href="{{ route('showProfile', ['id' => $comment->user_id]) }}"><label style="margin: 0;">{{ $comment->name }}</label></a>
                        @if ($comment->user_id==Auth::user()->id)
                            <a onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('deleteComment', ['id' => $comment->id]) }}" style="float: right;"><i id="stepsIcon" class="fa fa-close" style="margin-right: 0;"></i></a>
                        @endif
                        <p style="color: gray;">{{ $comment->date }}</p>
                        <p style="font-size: 14px; margin-bottom: 0;">{{ $comment->comment }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    @endisset
@endsection
@extends('layouts.app')
@section('content')
    @isset ($tutorials, $materials, $tools, $steps, $comments, $profiles, $users)
    <div class="show">
        <a id="back" class="showColumn" href="{{ URL::previous() }}"><i id="backIcon" class="fa fa-arrow-left"></i></a>
        <div class="showColumn">
            <div class="formStyle" style="max-width: 450px; width: 450px; margin-right: 10px;">
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
            <div class="formStyle" style="padding: 12px; margin-bottom: 0;">
                <div class="showColumn" style=" height: 100%;">
                <a href="{{ route('showProfile', ['id' => $profiles->user_id]) }}" style=" vertical-align: middle;"><img class="showAvatar" src="/avatarsIMG/{{ $profiles->avatar }}"></a>
                </div>
                <div class="showColumn showDetails">
                    <a href="{{ route('showProfile', ['id' => $profiles->user_id]) }}"><p class="showUser">{{ $users->name }}</p></a>
                    <p class="commentDate" style="margin-bottom: 2px; font-size: 11px;">Opublikowano:</p>
                    <p class="commentDate">{{ date('d.m.yy', strtotime($tutorials->date)) }}</p>
                </div>
            </div>
            @auth
                <a class="buttonStyle buttonFavourites"><p style="display: inline-block; margin: 0 6px 0 0;">Dodaj do ulubionych</p><i class="fas fa-heart" style="color: white; margin-left: 6px;"></i></a>    
            @endauth
        </div>
    </div>

    <div class="formStyle" style="max-width: 600px;">
        <h3 style="margin-bottom: 30px; text-align: center;">Komentarze</h3>
        
            <form method="POST" action="{{ route('addComment') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <label>Napisz komentarz</label><br>
                @guest
                    <p style="font-size: 15px; margin: 10px 0 0 0;">Aby skomentować <a class="a" href="{{ route('login') }}">zaloguj się</a> lub <a class="a" href="{{ route('register') }}">zarejestruj</a>.</p>
                @endguest
                @auth
                    <textarea name="comment" class="inputText" type="text" maxlength="300" required style="margin-bottom: 8px;"></textarea>
                    <button type="submit" class="buttonStyle" style="margin: 0 auto 40px auto;">Opublikuj</button>
                @endauth
                <input type="hidden" name="tutorial_id" value="{{ $tutorials-> id}}">
            </form>
        
        
        <ul class="commentList">
            @foreach ($comments as $comment)
                <li class="comment">
                    <div class="commentAvatar">
                        <a href="{{ route('showProfile', ['id' => $comment->user_id]) }}"><img class="commentImg" src="/avatarsIMG/{{ $comment->avatar }}"></a>
                    </div>
                    <div class="commentContent">
                        <a href="{{ route('showProfile', ['id' => $comment->user_id]) }}" class="commentUser">{{ $comment->name }}</a>
                        @auth
                            @if ($comment->user_id==Auth::user()->id)
                                <a onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('deleteComment', ['id' => $comment->id]) }}" style="float: right;"><i id="stepsIcon" class="fa fa-close" style="margin-right: 0;"></i></a>
                            @endif
                        @endauth
                        <p class="commentDate">{{ date('d.m.yy', strtotime($comment->date)) }}, godz. {{ date('H:i', strtotime($comment->date)) }}</p>
                        <p class="commentComment" >{{ $comment->comment }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    @endisset
@endsection
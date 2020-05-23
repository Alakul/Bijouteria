@extends('layouts.app')
@section('content')
    @if(session()->has('success'))
        <div class=" alertDatabase">
            {{ session()->get('success') }}
        </div>
    @elseif (session()->has('fail'))
        <div class=" alertDatabase">
            {{ session()->get('fail') }}
        </div>
    @endif
    @isset ($tutorials, $materials, $tools, $steps, $comments, $profiles, $users)
    <div class="show">
        <div class="showColumn">

            <div id="profileTutorialUp" class="profileTutorial">
                <div class="showColumn" style="height: 100%;">
                <a href="{{ route('showProfile', ['id' => $profiles->user_id]) }}" style=" vertical-align: middle;"><img class="showAvatar" src="/storage/avatarsIMG/{{ $profiles->avatar }}"></a>
                </div>
                <div class="showColumn showDetails">
                    <a href="{{ route('showProfile', ['id' => $profiles->user_id]) }}"><p class="showUser">{{ $users->name }}</p></a>
                    <p class="commentDate" style="margin-bottom: 2px; font-size: 11px;">Opublikowano:</p>
                    <p class="commentDate">{{ date('d.m.yy', strtotime($tutorials->date)) }}</p>
                </div>
                @if (Auth::guard('admin')->check())
                @elseif (Auth::check())
                    @if ($tutorials->user_id!=Auth::user()->id)
                        <a class="buttons buttonStyle" href="{{ route('addFavourite', ['id' => $tutorials->id]) }}"><i class="fas fa-heart"></i><p class="buttonText">Dodaj do ulubionych</p></a>
                    @else
                    <div style="display: flex; box-sizing: border-box;">
                        <div class="showColumn" style="width: 50%;">
                            <a class="buttons buttonStyle" href="{{ route('editTutorial', ['id' => $tutorials->id]) }}" style="display: block;  margin-right: 2px;"><i class="fas fa-edit"></i><p class="buttonText">Edytuj</p></a>
                        </div>
                        <div class="showColumn" style="width: 50%;">
                            <a class="buttons buttonStyle" onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyTutorial', ['id' => $tutorials->id]) }}" style=" display: block;  margin-left: 2px;"><i class="fa fa-close"></i><p class="buttonText">Usuń</p></a>
                        </div>
                    </div>
                    @endif
                @endif
            </div>

            <div class="showTutorial">
                <h2 class="showHeadline">{{ $tutorials->title }}</h2>

                <img class="showImg" src="/storage/tutorialsIMG/{{ $tutorials->title_picture }}">
                <p class="showDescription">{{ $tutorials->description }}</p>

                <label class="showLabel" style="display: inline-block; margin: 16px 0 40px 30px;">Kategoria:</label>
                <p class="showCategory">{{ $tutorials->category }}</p><br>

                <label class="showLabel">Wymagane materiały:</label>
                <ul id="showMaterialsList" class="showList">
                    @foreach ($materials as $material)
                        <li>{{ $material->material}}</li>
                    @endforeach
                </ul>
                    
                <label class="showLabel">Wymagane narzędzia:</label>
                <ul id="showToolsList" class="showList">
                    @foreach ($tools as $tool)
                        <li>{{ $tool->tool}}</li>
                    @endforeach
                </ul>
                
                <div id="stepShow">
                    <ul id="stepsList">
                        @foreach ($steps as $step)
                            <li class="showSteps">
                                <h3 class="showH3">Krok {{ $step->step}}:</h3>
                                <img id="imgStepShow" class="showImg" src="/storage/tutorialsIMG/{{ $step->picture }}">
                                <p class="showDescriptionStep">{{ $step->description}}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="showColumn">
            <div id="profileTutorialRight" class="profile" style="padding: 16px; max-width: 240px;">
                <div class="showColumn" style="height: 100%;">
                <a href="{{ route('showProfile', ['id' => $profiles->user_id]) }}" style=" vertical-align: middle;"><img class="showAvatar" src="/storage/avatarsIMG/{{ $profiles->avatar }}"></a>
                </div>
                <div class="showColumn showDetails">
                    <a href="{{ route('showProfile', ['id' => $profiles->user_id]) }}"><p class="showUser">{{ $users->name }}</p></a>
                    <p class="commentDate" style="margin-bottom: 2px; font-size: 11px;">Opublikowano:</p>
                    <p class="commentDate">{{ date('d.m.yy', strtotime($tutorials->date)) }}</p>
                </div>
                @if (Auth::guard('admin')->check())
                @elseif (Auth::check())
                    @if ($tutorials->user_id!=Auth::user()->id)
                        <a class="buttons buttonStyle" href="{{ route('addFavourite', ['id' => $tutorials->id]) }}"><i class="fas fa-heart"></i><p class="buttonText">Dodaj do ulubionych</p></a>
                    @else
                        <a class="buttons buttonStyle" href="{{ route('editTutorial', ['id' => $tutorials->id]) }}" style="display: block; margin-right: 2px;"><i class="fas fa-edit"></i><p class="buttonText">Edytuj</p></a>
                    @endif
                @endif
            </div>
        </div>
    </div>

    <div class="formStyle" id="comments" style="max-width: 650px; margin-top: 0;">
        <h3 style="margin-bottom: 30px; text-align: center;">Komentarze</h3>
        
            <form method="POST" action="{{ route('storeComment') }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                @if (Auth::guard('admin')->check())
                @elseif (Auth::check())
                    <label>Napisz komentarz</label>
                    <textarea name="comment" class="inputText" type="text" maxlength="300" required style="margin-bottom: 0;"></textarea>
                    <button type="submit" class="buttonStyle buttonSubmit" style="width: 100%;">Opublikuj</button>
                @else
                    <label>Napisz komentarz</label>
                    <p class="commentWrite">Aby skomentować <a class="a" href="{{ route('login') }}">zaloguj się</a> lub <a class="a" href="{{ route('register') }}">zarejestruj</a>.</p>
                @endif

                <input type="hidden" name="tutorial_id" value="{{ $tutorials-> id}}">
            </form>
        
        <ul class="commentList">
            @foreach ($comments as $comment)
                <li class="comment">
                    <div class="commentAvatar">
                        <a href="{{ route('showProfile', ['id' => $comment->user_id]) }}"><img class="commentImg" src="/storage/avatarsIMG/{{ $comment->avatar }}"></a>
                    </div>
                    <div class="commentContent">
                        <a href="{{ route('showProfile', ['id' => $comment->user_id]) }}" class="commentUser">{{ $comment->name }}</a>

                        @if (Auth::guard('admin')->check())
                            <a onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyCommentAdmin', ['id' => $comment->id]) }}" style="float: right;"><i id="stepsIcon" class="fa fa-close" style="margin-right: 0;"></i></a>
                        @elseif (Auth::check())
                            @if ($comment->user_id==Auth::user()->id)
                                <a onclick="return confirm('Czy na pewno chcesz usunąć?')" href="{{ route('destroyComment', ['id' => $comment->id]) }}" style="float: right;"><i id="stepsIcon" class="fa fa-close" style="margin-right: 0;"></i></a>
                            @endif
                        @endif

                        <p class="commentDate" style="font-size: 13px;">{{ date('d.m.yy', strtotime($comment->date)) }}, godz. {{ date('H:i', strtotime($comment->date)) }}</p>
                        <p class="commentComment" >{{ $comment->comment }}</p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    @endisset
@endsection
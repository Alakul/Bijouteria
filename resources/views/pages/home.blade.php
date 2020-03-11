@extends('layouts.app')
@section('content')
    <div id ="miniature">
        <p id="authorMiniature"><img id="authorImgMiniature">Autor</p>
        <img id="imgMiniature" >
        <p id="titleMiniature">Tytuł jsdaoj sdajsado oadsiosadn djd dhkas ajhksd wsjdk s jskad  jaksd s</p>
    </div>
    <table>
    @isset($tutorialsList)
    @foreach ($tutorialsList as $tutorial)
        <tr>
            <td> {{ $tutorial->category }}</td>
            <td> {{ $tutorial->description }}</td>
        </tr>

    @endforeach
    @endisset
    </table>
@endsection

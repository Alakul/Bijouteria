@extends('layouts.app')

@section('content')
    @if (session('status'))
        {{ session('status') }}
     @endif
    <center>
        <form method="POST" action="{{ route('password.email') }}" class="formStyle">
            <h2>RESETUJ HASŁO</h2>
            @csrf
            <div class="inputArea">
                            
                <label for="email">Adres email</label><br/>
                <input id="email" class="inputText" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror<br/>

                <button type="submit" class="buttonStyle" style="margin: 30px; font-size: 16px;">Wyślij link resetujący hasło</button>
            </div>
        </form>
    </center>
@endsection
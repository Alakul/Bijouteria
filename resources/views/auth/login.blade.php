@extends('layouts.app')
@section('content')
    <center>
		<form method="POST" action="{{ route('login') }}" class="formStyle">
			<h2>LOGOWANIE</h2>
			@csrf
			<div class="inputArea">
				<input id="email" name="email" class="inputText" type="email" placeholder="Email" required autocomplete="email" autofocus>
				@error('email')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror<br/>

				<input id="password" name="password" class="inputText" type="password" placeholder="Hasło" required autocomplete="current-password">
				@error('password')
                    <span role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                 @enderror<br/>

				<input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
				<label id="savePassword" for="remember">Zapamiętaj hasło</label><br/>
				<button type="submit" class="buttonStyle" style="margin: 30px; font-size: 16px;">Zaloguj się</button>
			</div>

			@if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Zapomniałeś hasła?</a>
            @endif

		</form>
	</center>
@endsection
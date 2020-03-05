@extends('layouts.app')
@section('content')
		<form method="POST" action="{{ route('login') }}" class="formStyle">
			<h2>Logowanie</h2>
			@csrf
			<div class="inputArea">
				@error('email')
                    <span role="alert" class="alertLogin">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror<br>
				<label>Email</label><br>
				<input id="email" name="email" class="inputText" type="email" required autocomplete="email" autofocus>
				

				<label>Hasło</label><br>
				<input id="password" name="password" class="inputText" type="password" required autocomplete="current-password">
				@error('password')
                    <span role="alert" class="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                @enderror<br>

				<div style="margin: 6px 20px 6px 20px; text-align: center;">
					<input id="remember" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
					<label id="savePassword" for="remember">Zapamiętaj hasło</label>
				</div>
				<button type="submit" class="buttonStyle" style="margin: 36px auto 10px auto; display: block;">ZALOGUJ SIĘ</button>
			</div>

			@if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" id="passwordRemind">Zapomniałeś hasła?</a>
            @endif

		</form>
@endsection
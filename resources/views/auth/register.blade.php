@extends('layouts.app')
@section('content')
		<form method="POST" action="{{ route('register') }}" class="formStyle">
			<h2 class="headline">Rejestracja</h2>
			@csrf
			<div class="inputArea">
				<br>
				<label>Login</label>
				<input id="name" name="name" type="text" class="inputText" required autocomplete="name" minlength="3" maxlength="20" onkeypress="preventSymbolLogin(event)">
				@error('name')
                    <span role="alert" class="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror<br/>
				
				<label>Email</label>
				<input id="email" name="email" class="inputText" type="email" required autocomplete="email" minlength="3" maxlength="320" onkeypress="checkSpace(event)">
				@error('email')
                    <span role="alert" class="alert">
                        <strong>{{ $message }}</strong>
                    </span>
				@enderror<br>
				 
				<label>Hasło</label>
				<input id="password" name="password" class="inputText" type="password" required autocomplete="new-password" minlength="8" maxlength="50" onkeypress="checkSpace(event)">
				@error('password')
                    <span role="alert" class="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                 @enderror<br>

				<label>Potwierdź hasło</label>
				<input id="password-confirm" name="password_confirmation" class="inputText" type="password" required autocomplete="new-password" minlength="8" maxlength="50" onkeypress="checkSpace(event)"><br>
				<button type="submit" class="buttonStyle" style="margin: 20px auto auto auto;">Zarejestruj się</button>
			</div>
		</form>
@endsection
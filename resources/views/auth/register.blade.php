@extends('layouts.app')
@section('content')
		<form method="POST" action="{{ route('register') }}" class="formStyle">
			<h2>Rejestracja</h2>
			@csrf
			<div class="inputArea">
				<label>Login</label><br>
				<input id="name" name="name" type="text" class="inputText" required autocomplete="name" autofocus>
				@error('name')
                    <span role="alert" class="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror<br/>
				
				<label>Email</label><br>
				<input id="email" name="email" class="inputText" type="email" required autocomplete="email" autofocus>
				@error('email')
                    <span role="alert" class="alert">
                        <strong>{{ $message }}</strong>
                    </span>
				@enderror<br>
				 
				<label>Hasło</label><br>
				<input id="password" name="password" class="inputText" type="password" required autocomplete="new-password">
				@error('password')
                    <span role="alert" class="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                 @enderror<br>

				<label>Potwierdź hasło</label><br>
				<input id="password-confirm" name="password_confirmation" class="inputText" type="password" required autocomplete="new-password"><br>
				<button type="submit" class="buttonStyle" style="margin: 20px auto 20px auto; display: block;">ZAREJESTRUJ SIĘ</button>
			</div>
		</form>
@endsection
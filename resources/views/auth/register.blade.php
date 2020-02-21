@extends('layouts.app')
@section('content')
    <center>
		<form method="POST" action="{{ route('register') }}" class="formStyle">
			<h2>REJESTRACJA</h2>
			@csrf
			<div class="inputArea">
				<input id="name" name="name" type="text" class="inputText" placeholder="Login" required autocomplete="name" autofocus>
				@error('name')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror<br/>
				
				<input id="email" name="email" class="inputText" type="email" placeholder="Email" required autocomplete="email" autofocus>
				@error('email')
                    <span role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
				 @enderror<br/>
				 
				<input id="password" name="password" class="inputText" type="password" placeholder="Hasło" required autocomplete="new-password">
				@error('password')
                    <span role="alert">
                         <strong>{{ $message }}</strong>
                    </span>
                 @enderror<br/>

				<input id="password-confirm" name="password_confirmation" class="inputText" type="password" placeholder="Potwierdź hasło" required autocomplete="new-password"><br/>
				<button type="submit" class="buttonStyle" style="margin: 30px; font-size: 16px;">Zarejestruj się</button>
			</div>
		</form>
	</center>
@endsection
@extends('layouts.app')
@section('content')
    <form method="POST" action="{{ route('changePassword') }}" class="formStyle" enctype="multipart/form-data">
        {{csrf_field()}}
        <h2 class="headline">Ustawienia</h2>
        <h3 style="margin-bottom: 30px; text-align: center;">Zmień hasło</h3>
		<div class="inputArea">
            @foreach ($errors->all() as $error)
                <span role="alert" class="alertMessage">
                    <strong>{{ $error }}</strong>
                </span>
            @endforeach<br>

            <label>Obecne hasło</label>
            <input  name="current_password" type="password" class="inputText" class="form-control" autocomplete="current-password">
            
            <label>Nowe hasło</label>
            <input id="new_password" name="new_password" class="inputText" type="password" class="form-control" autocomplete="current-password">

            <label>Potwierdź nowe hasło</label>
            <input id="new_confirm_password" name="new_confirm_password" class="inputText" type="password" class="form-control" autocomplete="current-password">

			<button type="submit" class="buttonStyle" style="margin: 30px auto 30px auto; display: block;">Zapisz</button>
		</div>
    </form>
@endsection
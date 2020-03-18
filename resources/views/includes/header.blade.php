<div>
	<div id="leftbox">
		<div style="float: left; margin-right: 14px;" id="categories" onClick=""><a class="buttons"><i class="fas fa-bars"></i></a>
			<ul class="listMenu" id="categoriesMenu" style="top: 45px;">
				<h4 class="listHeader">Kategorie</h4>
				<li><a id="bransoletki" onclick="chooseCategory(this);" href="{{ route('home') }}">Bransoletki</a></li>
				<li><a id="broszki" onclick="chooseCategory(this);" href="{{ route('home') }}">Broszki</a></li>
				<li><a id="kolczyki" onclick="chooseCategory(this);" href="{{ route('home') }}">Kolczyki</a></li>
				<li><a id="naszyjniki" onclick="chooseCategory(this);" href="{{ route('home') }}">Naszyjniki</a></li>
				<li><a id="ozdoby do włosów" onclick="chooseCategory(this);" href="{{ route('home') }}">Ozdoby do włosów</a></li>
				<li><a id="pierścionki" onclick="chooseCategory(this);" href="{{ route('home') }}">Pierścionki</a></li>
				<li><a id="zawieszki" onclick="chooseCategory(this);" href="{{ route('home') }}">Zawieszki</a></li>
				<li><a id="inne" onclick="chooseCategory(this);" href="{{ route('home') }}">Inne</a></li>
			</ul>
		</div>
		<form action="action_page.php">
			<input class="searchBar" setype="text" placeholder="Szukaj...">
			<button class="searchButton"><i class='fas'>&#xf002;</i></button>
		</form>
	</div>

	<div id="middlebox">
		<a href="{{ route('home') }}"><img id="logo" src="{{ asset('img/logo.png') }}" alt="fortissimo logo"></a>
	</div>

	<div id="rightbox">
		<a style="float: right; margin-left: 14px;" href="{{ route('login') }}" class="buttonStyle">ZALOGUJ</a>
		<a style="float: right;" href="{{ route('register') }}" class="buttonStyle">ZAREJESTRUJ SIĘ</a>
	</div>
</div>
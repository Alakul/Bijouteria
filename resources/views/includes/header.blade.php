<div>
	<div id="leftbox">
		<div style="float: left; margin-right: 14px;" id="categories" onClick="listMenu(this)"><a class="buttons"><i class="fas fa-bars"></i></a>
			<ul class="listMenu" id="categoriesMenu" style="top: 50px;">
				<h4 class="listHeader">Kategorie</h4>
				<li><a>Bransoletki</a></li>
				<li><a>Broszki</a></li>
				<li><a>Kolczyki</a></li>
				<li><a>Naszyjniki</a></li>
				<li><a>Ozdoby do włosów</a></li>
				<li><a>Pierścionki</a></li>
				<li><a>Zawieszki</a></li>
				<li><a>Inne</a></li>
			</ul>
		</div>
		<form action="action_page.php">
			<input class="searchBar" setype="text" placeholder="Szukaj...">
			<button class="searchButton"><i class='fas'>&#xf002;</i></button>
		</form>
	</div>

	<div id="middlebox">
		<a href="{{route('home') }}"><img id="logo" src="{{ asset('img/logo.png') }}" alt="fortissimo logo"></a>
	</div>

	<div id="rightbox">
		<a style="float: right; margin-left: 14px;" href="{{ route('login') }}" class="buttonStyle">ZALOGUJ</a>
		<a style="float: right;" href="{{ route('register') }}" class="buttonStyle">ZAREJESTRUJ SIĘ</a>
	</div>
</div>
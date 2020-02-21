<ul>
	<li style="float: left;" id ="categories" onClick="listMenu(this)"><a class="buttonStyle"><i class="fas fa-bars"></i></a>
		<ul class="listMenu" id="categoriesMenu" style="top: 46px;">
			<h4 class="listHeader">Kategorie</h4>
			<li><a>Bransoletki</a></li>
			<li><a>Broszki</a></li>
			<li><a>Kolczyki</a></li>
			<li><a>Naszyjniki</a></li>
			<li><a>Ozdoby do włosów</a></li>
			<li><a>Pierścionki</a></li>
			<li><a>Inne</a></li>
		</ul>
	</li>
	<li style="float: left;">
		<form action="action_page.php">
			<input class="searchBar" setype="text" placeholder="Szukaj...">
			<button class="searchButton"><i class='fas'>&#xf002;</i></button>
		</form>
	</li>
	<li><a href="{{ url('/') }}"><img id="logo" src="{{ asset('img/logo.png') }}" alt="fortissimo logo"></a></li>
	<li style="float: right;"><a href="{{ route('login') }}" class="buttonStyle">ZALOGUJ</a></li>
	<li style="float: right;"><a href="{{ route('register') }}" class="buttonStyle">ZAREJESTRUJ SIĘ</a></li>
</ul>
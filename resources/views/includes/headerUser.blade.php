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
		<div id="user" style="float: right;" onClick=""><a id="username"><img id="userAvatar" src="https://image.ceneostatic.pl/data/products/40255890/i-evanescence-fallen-cd.jpg"><p id="userLogin">{{ Auth::user()->name }}</p></a>
			<ul class="listMenu" id="userMenu" style="right: 16px; top: 45px;">
				<h4 class="listHeader">Użytkownik</h4>
				<li><a href="{{ route('profile') }}">Profil</a></li>
				<li><a href="{{ route('home') }}">Ulubione</a></li>
				<li><a href="{{ route('settings') }}">Ustawienia</a></li>
				<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj</a></li>
				
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</ul>
		</div>
		
		<a style="float: right;" href="{{ route('create') }}" class="buttons"><i class="fa fa-plus"></i></a>
	</div>
</div>
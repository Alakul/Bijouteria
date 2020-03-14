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
		<div style="float: right;" id="user" onClick="listMenu(this)"><a class="buttons">{{ Auth::user()->name }}</a>
			<ul class="listMenu" id="userMenu" style="right: 16px; top: 46px;">
				<h4 class="listHeader">Użytkownik</h4>
				<li><a>Profil</a></li>
				<li><a>Ulubione</a></li>
				<li><a>Ustawienia</a></li>
				<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj</a></li>
				
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</ul>
		</div>
		<a style="float: right;" href="{{ route('create') }}" class="buttons"><i class="fa fa-plus"></i></a>
	</div>
</div>
<div>
	<div id="leftbox">
		<div id="categories" class="menuElement" style="margin-right: 14px; float: left;" onClick=""><i class="fas fa-bars"></i><p class="menuText" style="margin-left: 10px;">Kategorie</p>
			<ul id="categoriesMenu" class="menuList" style="top: 40px;">
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
			<button class="searchButton"><i class='fas' style="color: white;">&#xf002;</i></button>
		</form>
	</div>

	<div id="middlebox">
		<a href="{{ route('home') }}"><img id="logo" src="{{ asset('img/logo.png') }}" alt="fortissimo logo"></a>
	</div>

	<div id="rightbox">
		<div id="user" class="menuElement" style="margin-left: 14px; float: right;" onClick=""><p class="menuText">{{ Auth::user()->name }}</p>
			<ul id="userMenu" class="menuList" style="right: 16px; top: 45px;">
				<li><a href="{{ route('profile') }}">Profil</a></li>
				<li><a href="{{ route('home') }}">Ulubione</a></li>
				<li><a href="{{ route('settings') }}">Ustawienia</a></li>
				<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj</a></li>
				
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</ul>
		</div>
		
		<a href="{{ route('createTutorial') }}" class="menuElement" style="float: right;"><i class="fa fa-plus"></i></a>
	</div>
</div>
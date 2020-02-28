<ul>
	<li style="float: left;" id="categories" onClick="listMenu(this)"><a class="buttons"><i class="fas fa-bars"></i></a>
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
	<li style="float: right;" id="user" onClick="listMenu(this)"><a class="buttons">{{ Auth::user()->name }}</a>
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
	</li>
	<li style="float: right;"><a class="buttons" href="{{action('HomeController@addTutorial')}}"><i class="fa fa-plus"></i></a></li>
</ul>
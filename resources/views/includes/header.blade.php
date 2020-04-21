<nav>
	<div id="leftbox">
		<div id="leftSide">
			<a class="menuElement" style="margin-right: 10px; float: left; display: none;"><i class="fas fa-bars"></i></a>
			<div id="categories" class="menuElement" style="margin-right: 14px; float: left;" onClick=""><p class="menuText">Kategorie</p>
				<ul id="categoriesMenu" class="menuList" style="left: 10px;">
					@foreach ($categories as $category)
						<li><a id="{{ $category->category }}" href="{{ route('showGallery', ['categorySelected'=> $category->category]) }}">{{ ucfirst(trans($category->category)) }}</a></li>
					@endforeach
				</ul>
			</div>
			<form method="POST" action="{{ route('searchTutorial') }}" enctype="multipart/form-data">
				{{ csrf_field() }}
				<input name="search" class="searchBar" setype="text" placeholder="Szukaj...">
				<button type="submit" class="searchButton"><i class='fas' style="color: white;">&#xf002;</i></button>
			</form>
		</div>

		<div id="menu" style="margin-right: 14px; float: left;" onClick="listMenu();"><i class="fa fa-bars" style="margin: 11px 0;"></i>
			<ul id="hamburgerMenu" class="menuList" style="left: 10px;">
				@if (Auth::guard('admin')->check())
				@elseif (Auth::check())
				@else
					<li><a style="font-weight: bold;" href="{{ route('login') }}"><i class="fas fa-user" style="margin-right: 10px;"></i>Logowanie</a></li>
					<li><a style="font-weight: bold;" href="{{ route('register') }}"><i class="fas fa-lock" style="margin-right: 10px;"></i>Rejestracja</a></li>
				@endif


				<lh style="font-weight: bold;">Kategorie</lh>
				@foreach ($categories as $category)
					<li><a id="{{ $category->category }}" href="{{ route('showGallery', ['categorySelected'=> $category->category]) }}">{{ ucfirst(trans($category->category)) }}</a></li>
				@endforeach


				@if (Auth::guard('admin')->check())
					<lh style="font-weight: bold;">Zarządzanie</lh>
					<li><a href="{{ route('showUsers') }}">Użytkownicy</a></li>
					<li><a href="{{ route('showTutorials') }}">Poradniki</a></li>
					<li><a href="{{ route('showComments') }}">Komentarze</a></li>
					<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj</a></li>
						
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				@elseif (Auth::check())
					<lh style="font-weight: bold;">Użytkownik</lh>
					<li><a href="{{ route('showProfile', ['id' => Auth::user()->id]) }}">Profil</a></li>
					<li><a href="{{ route('showFavourite') }}">Ulubione</a></li>
					<li><a href="{{ route('settings') }}">Ustawienia</a></li>
					<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj</a></li>
						
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				@endif

			</ul>
		</div>

	</div>

	<div id="middlebox">
		<a href="{{ route('home') }}"><img id="logo" src="{{ asset('img/logo.png') }}" alt="fortissimo logo"></a>
	</div>

	@if (Auth::guard('admin')->check())
    <div id="rightbox">
		<div id="user" class="menuElement" style="margin-left: 14px; float: right;" onClick=""><p class="menuText">Admin</p>
			<ul id="userMenu" class="menuList" style="right: 10px">
				<li><a href="{{ route('showUsers') }}">Użytkownicy</a></li>
				<li><a href="{{ route('showTutorials') }}">Poradniki</a></li>
				<li><a href="{{ route('showComments') }}">Komentarze</a></li>
				<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj</a></li>
					
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</ul>
		</div>
	</div>
	@elseif (Auth::check())
	<div id="rightbox">
		<div id="user" class="menuElement" style="margin-left: 14px; float: right;" onClick=""><p class="menuText">{{ Auth::user()->name }}</p>
			<ul id="userMenu" class="menuList" style="right: 10px">
				<li><a href="{{ route('showProfile', ['id' => Auth::user()->id]) }}">Profil</a></li>
				<li><a href="{{ route('showFavourite') }}">Ulubione</a></li>
				<li><a href="{{ route('settings') }}">Ustawienia</a></li>
				<li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Wyloguj</a></li>
					
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</ul>
		</div>
			
		<a href="{{ route('createTutorial') }}" class="menuElement" style="float: right;"><i class="fa fa-plus" style="margin: 11px 0;"></i></a>
	</div>
	@else
	<div id="rightbox">
			<a style="float: right; margin-left: 14px;" href="{{ route('login') }}" class="buttonStyle menuButton">LOGOWANIE</a>
			<a style="float: right;" href="{{ route('register') }}" class="buttonStyle menuButton">REJESTRACJA</a>
		</div>
	@endif
</nav>
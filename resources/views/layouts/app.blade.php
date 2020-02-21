<!doctype html>
<html>
	<head>
        @include('includes.head')
    </head>
    <body>
        <header>
            @guest                 
                @if (Route::has('register'))              
                    @include('includes.header')
                @endif
                @else
                    @include('includes.headerUser')
            @endguest    
        </header>
        
        <main>
            @yield('content')
        </main>
    </body>
</html>

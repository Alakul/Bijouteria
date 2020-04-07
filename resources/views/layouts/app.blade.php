<!doctype html>
<html>
	<head>
        @include('includes.head')
    </head>
    <body>
        <header>           
            @include('includes.header') 
        </header>
        
        <main>
            @yield('content')
        </main>
    </body>
</html>

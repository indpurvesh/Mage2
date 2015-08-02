<!doctype html>
<html>
<head>
    @include('admin.includes.head')
</head>
<body>
<div class="container-fluid">
	<div class="content_wrapper">
	    <header class="">
	        @include('admin.includes.header')
	    </header>
	    <div id="main" class="">
	    	@yield('content')
	    </div>
	
	    <footer class="">
	        <h1>Footer Area</h1>
	    </footer>
	</div>
</div>
</body>
</html>
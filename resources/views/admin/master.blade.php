<!doctype html>
<html>
<head>
    @include('admin.includes.head')
</head>
<body>
<div class="container-fluid">
	<div class="content_wrapper">
	    <header class="row">
	        @include('admin.includes.header')
	    </header>
	    <div id="main" class="row content_wrapper">
	    	@yield('content')
	    </div>
	
	    <footer class="row content_wrapper ">
	        <h1>Footer Area</h1>
	    </footer>
	</div>
</div>
</body>
</html>
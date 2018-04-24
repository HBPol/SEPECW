<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <!-- Style for this page in particular -->
    <style type="text/css">
    body {
    	padding-top: 3.5rem; /* Move down content because we have a fixed navbar that is 3.5rem tall */
    	background-color: #fff;
    	color: #636b6f;
    	font-family: 'Raleway', sans-serif;
    	font-weight: 100;
    	height: 100vh;
    	margin: 0;
    }
    </style>
    
    <title></title>
</head>
<body>
	
    @include ('layouts/topnav')
	
	<div class="container">
    	@if(Session::has('flash_message'))
    		<br>
            <div class="alert alert-success">
            	<em> {!! session('flash_message') !!}</em>
            </div>
        @endif 
		<br>
		@include ('errors.list') {{-- Including error file --}}
        <br>
        @yield('content')
        <br>
    </div>
    
    @include ('layouts/footer')
    
</body>
</html>
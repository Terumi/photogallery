<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <style>
            form{display:inline-block;}.img-uploaded{margin-bottom: 5px;}h4, p{margin-bottom: 0;}hr{margin-top: 5px;}.row{margin-top: 15px;}
        </style>
	</head>
	<body>
        <div class="container">
			@if (Session::has('message'))
				<div class="flash alert">
					<p>{{ Session::get('message') }}</p>
				</div>
			@endif
			@yield('main')
		</div>
	</body>
</html>
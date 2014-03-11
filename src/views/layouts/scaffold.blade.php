<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
        <script src="{{asset('packages/ffy/photogallery/js/jquery.min.js')}}"></script>
        <script src="{{asset('packages/ffy/photogallery/js/bootstrap-tagsinput.min.js')}}"></script>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link href="{{asset('packages/ffy/photogallery/css/bootstrap-tagsinput.css')}}" rel="stylesheet">
		<link href="{{asset('packages/ffy/photogallery/css/style.css')}}" rel="stylesheet">
	</head>
	<body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{url(Config::get('photogallery::url_prefix').'photogallery') }}">Ffy photogallery</a>
            </div>
            <?php
                $photos_class = ( Request::is('*/photos') || Request::is('*/photos'.'/*') ) ? ' class="active"' : '';
                $albums_class = ( Request::is('*/albums') || Request::is('*/albums'.'/*') ) ? ' class="active"' : '';
            ?>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li {{$albums_class}}><a href="{{action('Ffy\Photogallery\AlbumsController@index')}}">Albums</a></li>
                    <li {{$photos_class}}><a href="{{action('Ffy\Photogallery\PhotosController@index')}}">Photos</a></li>
                </ul>
            </div>
        </div>
    </nav>
        <div class="container">
        @if (Session::has('message'))
            <div class="alert alert-warning">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif
        @yield('main')
		</div>
	</body>
</html>
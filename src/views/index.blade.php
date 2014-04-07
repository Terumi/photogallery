@extends('photogallery::layouts.scaffold')

@section('main')
<div class="page-header">
    <h1>Laravel + Bootstrap photo gallery</h1>
</div>
<br/>
<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <a href="{{ action('Ffy\Photogallery\AlbumsController@index') }}" type="button" class="btn btn-default btn-lg btn-block">Albums</a>
        <a href="{{ action('Ffy\Photogallery\PhotosController@index') }}" type="button" class="btn btn-default btn-lg btn-block">Photos</a>
    </div>
</div>
@stop
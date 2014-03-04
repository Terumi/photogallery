@extends('photogallery::layouts.scaffold')

@section('main')

<h1>All Albums</h1>

<p>{{ link_to_action('Ffy\Photogallery\AlbumsController@create', 'Add new album', null, array('class'=> 'btn
    btn-primary')) }}</p>

@if ($albums->count())
    @foreach (array_chunk($albums->all(), 4) as $bundle)
    <div class="row">
        @foreach ($bundle as $album)

        <div class="col-lg-3">
            <h3>{{{ $album->name }}}<span class="badge pull-right">{{count($album->photos)}}</span></h3>
            <hr class="bottom-sm"/>
            <p>description:</p>
            <p class="text-muted">{{{ $album->description }}}</p>
            <p>tags:</p>
            <p class="text-muted">{{{ $album->tags }}}</p>
            <br/>
            {{ link_to_action('Ffy\Photogallery\AlbumsController@edit', 'Edit', array($album->id), array('class' =>
            'btn btn-info btn-xs')) }}
            {{ Form::open(array('method' => 'DELETE', 'action' => array('Ffy\Photogallery\AlbumsController@destroy',
            $album->id))) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) }}
            {{ Form::close() }}
        </div>
        @endforeach
    </div>
    @endforeach

    @if(Config::get('photogallery::pagination_items'))
        {{ $albums->links() }}
    @endif
@else
There are no albums
@endif

@stop

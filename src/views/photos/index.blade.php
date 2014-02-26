@extends('photogallery::layouts.scaffold')

@section('main')

<h1>All Photos</h1>

<p>{{ link_to_action('Ffy\Photogallery\PhotosController@create', 'Add new photo', null, array('class'=> 'btn
    btn-primary')) }}</p>

@if ($photos->count())
    @foreach (array_chunk($photos->all(), 6) as $bundle)
    <div class="row">
        @foreach ($bundle as $photo)
        <div class="col-lg-2">
            <h4>{{{ $photo->name }}}</h4>
            @if(isset($photo->alt))
            <p class="text-muted">{{{ $photo->alt }}}</p>
            @endif
            <hr/>
            <img src="{{asset(Config::get('photogallery::upload_folder').$photo->url)}}" class="img-rounded img-responsive img-uploaded" alt=""/>
            {{ link_to_action('Ffy\Photogallery\PhotosController@edit', 'Edit', array($photo->id), array('class' =>
            'btn btn-info btn-xs')) }}
            {{ Form::open(array('method' => 'DELETE', 'action' => array('Ffy\Photogallery\PhotosController@destroy',
            $photo->id))) }}
            {{ Form::submit('Delete', array('class' => 'btn btn-danger btn-xs')) }}
            {{ Form::close() }}
        </div>
        @endforeach
    </div>
    @endforeach

    @if(Config::get('photogallery::pagination_items'))
        {{ $photos->links() }}
    @endif
@else
There are no photos
@endif

@stop

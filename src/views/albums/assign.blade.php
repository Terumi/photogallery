@extends('photogallery::layouts.scaffold')

@section('main')

<h1>Assign photos to "{{ $album->name }}"<span class="badge">{{ count($album->photos) }} photos</span></h1>

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
        @if(in_array($photo->id, $album->photos->lists('id')))
            {{ Form::open(array('method' => 'POST', 'action' => array('Ffy\Photogallery\AlbumsController@removePhoto') )) }}
            {{ Form::submit('Remove from album', array('class' => 'btn btn-danger btn-xs')) }}
        @else
            {{ Form::open(array('method' => 'POST', 'action' => array('Ffy\Photogallery\AlbumsController@addPhoto') )) }}
            {{ Form::submit('Add to album', array('class' => 'btn btn-primary btn-xs')) }}
        @endif
        {{ Form::hidden('id',$album->id) }}
        {{ Form::hidden('photo_id',$photo->id) }}
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





@if ($errors->any())
<ul>
    {{ implode('', $errors->all('
    <li class="error">:message</li>
    ')) }}
</ul>
@endif

@if(Config::get('photogallery::pagination_items'))
{{ $photos->links() }}
@endif

@stop
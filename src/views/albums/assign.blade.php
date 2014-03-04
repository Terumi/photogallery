@extends('photogallery::layouts.scaffold')

@section('main')

<h1>Assign photos to "{{$album->name}}"</h1>

@foreach(array_chunk($photos->all(), 6) as $batch)
<div class="row">
    @foreach($batch as $photo)
    <div class="col-lg-2">
        <img src="{{asset(Config::get('photogallery::upload_folder').$photo->url)}}" class="img-rounded img-responsive img-uploaded" alt=""/>
    </div>
    @endforeach
</div>
@endforeach


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



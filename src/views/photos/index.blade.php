@extends('layouts.scaffold')

@section('main')

<h1>All Photos</h1>

<p>{{ link_to_action('Ffy\Photogallery\PhotosController@create', 'Add new photo') }}</p>

@if ($photos->count())
	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Name</th>
				<th>Url</th>
				<th>Alt</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($photos as $photo)
				<tr>
					<td>{{{ $photo->name }}}</td>
					<td>{{{ $photo->url }}}</td>
					<td>{{{ $photo->alt }}}</td>
                    <td>{{ link_to_action('Ffy\Photogallery\PhotosController@edit', 'Edit', array($photo->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'action' => array('Ffy\Photogallery\PhotosController@destroy', $photo->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no photos
@endif

@stop

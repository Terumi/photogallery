@extends('photogallery::layouts.scaffold')

@section('main')

<h1>Show Album</h1>

<p>{{ link_to_action('Ffy\Photogallery\AlbumsController@index', 'Return to all albums') }}</p>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Name</th>
				<th>Description</th>
				<th>Tags</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $album->name }}}</td>
					<td>{{{ $album->description }}}</td>
					<td>{{{ $album->tags }}}</td>
                    <td>{{ link_to_action('Ffy\Photogallery\AlbumsController@edit', 'Edit', array($album->id), array('class' => 'btn btn-info')) }}</td>
                    <td>
                        {{ Form::open(array('method' => 'DELETE', 'action' => array('Ffy\Photogallery\AlbumsController@destroy', $album->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
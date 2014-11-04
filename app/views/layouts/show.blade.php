@extends('layouts.master')

@section('content')

<h1> Show List</h1>
<p>{{link_to_route('posts.index', 'Return to all posts')}}</p>

<table class="table table-striped table-bordered table-hover">

<thead>
<tr> 
<th>Day</th>
<th>Description</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
<tr>
	<td> {{ $posts->name}}</td>
	<td> {{ $posts->body}}</td>
	<td>{{ link_to_route('posts.edit', 'edit',array($posts->id), array('class' => 'btn btn-info'))}}</td>
	<td>
	{{ Form::open(array('method' => 'Delete', 'route' => array('posts.destroy', $posts->id)))}}
		{{ Form::submit('Delete', array('class' => 'btn btn-danger'))}}
	{{ Form::close()}}
	</td>
	</tr>
	</tbody>
	</table>
	@stop
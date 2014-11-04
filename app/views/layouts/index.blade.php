@extends('layouts.master')
@section('content')
<div class="page-header" style="border: 1px solid #0077b3; text-align: center">
<h1>A Simple Todo-list in Laravel 4</h1>
</p></div>
<div class="panel panel-default">
<div class="panel-body">
           <p>{{ link_to_route('posts.create', 'add new')}}</p>

        </div>
</div>
    @if ($posts->count())
<table class="table table-striped table-hover">
<thead>
<tr>
<th>Day</th>
<th>Description</th>
<th>Actions</th>
</tr>
</thead>
<tbody>
                @foreach($posts as $post)
<tr>
<td>{{ $post->name }}</td>
<td>{{ $post->body }}</td>
<td>
            {{ link_to_route('posts.show', 'View',array($post->id),array('class'=> 'btn btn-default'))}}
            {{ link_to_route('posts.edit', 'Update',array($post->id),array('class'=> 'btn btn-primary'))}}
             {{ link_to_route('posts.destroy', 'Delete',array($post->id),array('class'=> 'btn btn-danger'))}}
                        
</td>
</tr>
                @endforeach
            </tbody>
</table>
@else
there are no todo list
    @endif
@stop
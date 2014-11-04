@extends('layouts.master')
@section('content')
<div class="page-header" style="border: 1px solid #0077b3;">
<h1>Edit List </h1>
</div>

{{ Form::model($posts, array('method' => 'PATCH', 'route' => array('posts.update', $posts->id)))}}
<ul>
<li>
    {{ Form::label('name')}}
    {{ Form::text('name')}}
</li>
<li>
    {{ Form::label('description')}}
    {{ Form::textarea('body')}}
</li>
<li>
    {{ Form::submit('Update',array('class'=> 'btn-success'))}}
    {{link_to_route('posts.show','Cancel', $posts->id, array('class'=>'btn btn-warning'))}}
</li>
{{Form::token()}}
</ul>
{{ Form::close()}}

@if($errors->any())
<ul>
  {{ implode('',$errors->all('<li class="error">:message</li>'))}}  
</ul>
@endif
@stop
@extends('layouts.master')
@section('content')
<div class="page-header" style="border: 1px solid #0077b3;">
<h1>Add New </h1>
</div>

{{ Form::open(array('route' => 'posts.store'))}}
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
    {{ Form::submit('Submit',array('class'=> 'btn-success'))}}
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
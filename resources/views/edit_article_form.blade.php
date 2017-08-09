@extends('layout.app')
@section('title','Edit article')

@section('content')
<h1> Edit article: </h1>
<form action="" class="form-horizontal" method="post">
    <label for="title">Title: </label>
    <input type="text" name="title" value="{{$title}}" class="form-control" />
    <br />
    <textarea  rows="10" cols="50" class="form-control" name="content">{{ $content }}</textarea>
     <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
      <br />
    <button class="btn btn-primary" type="submit">Save changes</button>
</form>

@endsection
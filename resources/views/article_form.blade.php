@extends('layout.app')

@section('title', 'New article')
@section('content')
    <legend>Write new article</legend>
        <form class="form-horizontal" action="/blog/new" method="post">
            <label for="title">Title: </label>
            <input type="text" name="title" class="form-control" />
             <br />
            <textarea rows="10" cols="50" id="edit_article" class="form-control" name="content"></textarea>
            <br />
            <button class="btn btn-primary" type="submit">Publish</button>
        <input type="hidden" name="_token" value={{ csrf_token() }} />
        </form>
@endsection

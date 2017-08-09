@extends('layout.app')

@section('content')
  <p> {!!$article->content !!} </p>

    <legend>Write comment</legend>
        <form class="form-horizontal" action="/blog/{{$article->id}}/comment" method="post">
            <textarea rows="10" cols="50" id="comment" class="form-control" name="body"></textarea>
            <br />
            <button class="btn btn-primary" type="submit">Submit</button>
        <input type="hidden" name="_token" value={{ csrf_token() }} />
        </form>
@endsection

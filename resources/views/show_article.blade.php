@extends('layout.app')
@section('title', $article->title)

@section('content')
<div class="well">
    <h2>{{$article->title}}</h2>
    <hr>
    <article> 
        {!!$article->content!!} 
    </article>
    <p>Author - {{$article->user->name}} </p>
            @if(isset(Auth::user()->id))
                @if($article->user == Auth::user())
                    <p><a href="{{route('edit_article',['id' => $article->id])}}">Edit</> <a href="{{route('delete_article',['id' => $article->id])}}">Delete</a></p>
                @endif 
            @endif
        <hr>
           <p>Comments: </p>
        @foreach($article->comments as $comment)
            <p><i>{{$comment->body}}</i> ({{$comment->user->email}}) </p>
        @endforeach
        <br />
         <a href="{{route('write_comment',['article_id' => $article->id])}}">Write comment</a>
</div>
@endsection
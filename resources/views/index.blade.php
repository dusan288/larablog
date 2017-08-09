@extends('layout.app')
@section('title', 'Listing')

@section('content')
<div class="jumbotron">
    <h2>Welcome @php isset(Auth::user()->email) ? print(Auth::user()->name) : ""; @endphp to LaraBlog <h2>
    <h3>Hope you will find something to read bellow :) </h3>
</div>
<div>
    <h3>Feeling inspired?</h3>
    <h3><a href="blog/new">Write new Article</a></h3>
</div>
  <div class="well">
  <h2>Recent Articles</h2>
    @foreach($articles as $article)
  
        <article>
        <h3>
            <a href="{{route('read_article',['article_id' => $article->id])}}"> {{$article->title}} </a>
        </h3> 
    @endforeach
        </article>
    </div>
    
@endsection
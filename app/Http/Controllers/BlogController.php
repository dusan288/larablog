<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Comment\ICommentService;
use App\Article;
use App\User;
use App\Comment;
use Blog;

class BlogController extends Controller
{
    private $commentService;

    public function __construct(ICommentService $service)
    {
        $this->commentService = $service;
    }
    public function index(Request $req)
    {

        $articles = [];
        /*
        if(isset($req->user()->email)) {
          $articles = $req->user()->articles;
        }
        */
        $articles = Article::orderBy('created_at', 'desc')->get();
        /*
        foreach($articles as $article)
        {
            echo "<p>".$article->content. "<br/>
            <a href=\"/blog/edit/{$article->id}\" >Edit</a>
            <a href=\"/blog/delete/{$article->id}\">Delete</a>
            </p>";
        }
         echo "<a href=\"/blog/new/\">Write new article</a>";
        //dd($articles);
        */
       // dd($articles);
        $data = ['articles' => $articles];
        return view('index', $data);
    }

    public function newArticle()
    {
        return view('article_form');
    }

    public function saveArticle(Request $req)
    {
        //Good design practise: 
        // Blog::saveArticle(Article $article, User $user)

        //dd($req->content);
        //create new Article 
         $this->validate($req, 
         [
             'content' => 'required',
             'title' => 'required|unique:articles'
         ]);
         /*
        $article = new Article();
        $article->content = $req->content;
        $article->user_id = $req->user()->id;
        $article->save();
        $message = "Article saved!";

       return redirect('/blog')->with('message', $message);
       */

       $message = "Article saved!";
       $attr = [
           'title' => $req->title,
           'content' => $req->content,
           'user_id' => $req->user()->id,
       ];
       //$this->blogService->saveArticle($attr);
       Blog::saveArticle($attr);
       return redirect('/blog')->with('message', $message);
    }

    public function editArticle($id, Request $req)
    {
        $article = Article::findOrFail($id);
        /*
        if($article->user_id != $req->user()->id) {
            return response("Action not allowed!", 401);
        }
        */
        return view('edit_article_form', $article);
    }

    public function saveChangedArticle($id, Request $req)
    {
        //dd($id);
        //create new Article 
        $article = Article::findOrFail($id);
        $article->content = $req->content;
        $article->title = $req->title;
        $article->save();

       return redirect('/blog');
    }

    public function deleteArticle($id)
    {
        Article::destroy($id);
        $msg = 'Article deleted!';
        return  redirect('/blog')->with(['message' => $msg]);
    }

    public function showArticle($article_id)
    {
        $article = Article::findOrFail($article_id);
        return view('show_article', ['article' => $article]);
    }

    public function getWriteComment($article_id)
    {
        $article = Article::findOrFail($article_id);
        return view('comment_form')->with(['article' => $article]);
    }

    public function postSaveComment($article_id, Request $req)
    {
       $comment = new Comment;
       $this->validate($req, [
        'body' => 'required|max:1000|min:10',
       ]);
       /*
       $comment->body = $req->body;
       $comment->article_id = $article_id;
       $comment->user_id = $req->user()->id;
       $comment->save();
       */

       $attr = [
           'body' => $req->body,
           'article_id' => $article_id,
           'user_id' => $req->user()->id,
       ];
       $this->commentService->saveComment($attr);
       $message = "Comment saved!";
       return redirect('/blog')->with(['message' => $message]);
    }
}

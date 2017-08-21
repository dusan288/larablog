<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Blog;

class BlogController extends Controller
{

    public function index(Request $req)
    {

        $articles = [];
        $articles = Blog::getAllArticles();
        $data = ['articles' => $articles];
        return view('index', $data);
    }

    public function newArticle()
    {
        return view('article_form');
    }

    public function saveArticle(Request $req)
    {
         $this->validate($req, 
         [
             'content' => 'required',
             'title' => 'required|unique:articles'
         ]);

       $attr = [
           'title' => $req->title,
           'content' => $req->content,
           'user_id' => $req->user()->id,
       ];

       Blog::saveArticle($attr);
       $message = "Article saved!";
       return redirect('/blog')->with('message', $message);
    }

    public function editArticle($id, Request $req)
    {
        $article = Blog::getArticleById($id);
        return view('edit_article_form', $article);
    }

    public function saveChangedArticle($id, Request $req)
    {
        Blog::updateArticle($id,  [
            'title' => $req->title, 'content' => $req->content 
            ]);
    
       return redirect('/blog');
    }

    public function deleteArticle($id)
    {
        Blog::deleteArticle($id);
        $msg = 'Article deleted!';
        return  redirect('/blog')->with(['message' => $msg]);
    }

    public function showArticle($article_id)
    {
        $article = Blog::getArticleById($article_id);
        return view('show_article', ['article' => $article]);
    }

    public function getWriteComment($article_id)
    {
        $article = Blog::getArticleById($article_id);
        return view('comment_form')->with(['article' => $article]);
    }

    public function postSaveComment($article_id, Request $req)
    {
       $this->validate($req, [
        'body' => 'required|max:1000|min:10',
       ]);

       $attr = [
           'body' => $req->body,
           'article_id' => $article_id,
           'user_id' => $req->user()->id,
       ];
  
       Blog::saveComment($attr);
       $message = "Comment saved!";
       return redirect()->route('read_article', ['article_id' => $article_id])->with(['message' => $message]);
    }
}

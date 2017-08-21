<?php

namespace App\Repositories;
use App\Article;

class EloquentArticle implements ArticleRepository
{
    private $articleModel;
    public function __construct(Article $model)
    {
        $this->articleModel = $model;      
    }

    public function create(array $attributes)
    {
       return $this->articleModel->create($attributes);
    }
    public function getById($id)
    {
        $article = $this->articleModel->findOrFail($id);
        return $article;
    }
    public function getAll()
    {
        $articles = $this->articleModel->orderBy('created_at', 'desc')->get();
        return $articles;
    }
    public function update($id, array $attributes)
    {
        $article = $this->getById($id);
        $article->title = $attributes['title'];
        $article->content = $attributes['content'];
        $article->save();
    }

    public function delete($id)
    {
        $this->articleModel->destroy($id);
    }
}
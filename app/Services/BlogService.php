<?php
namespace App\Services;

use App\Article;
class BlogService 
{
    private $articleModel;

    public function __construct(Article $model)
    {
        $this->articleModel = $model;
    }
    public function saveArticle(array $attributes)
    {   
        return $this->articleModel->create($attributes);
    }

}
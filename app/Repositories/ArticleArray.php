<?php
namespace App\Repositories;
use App\Article;
class ArticleArray implements ArticleRepository
{
    private $articles = []; 
    public function create(array $attributes)
    {
        $article = new Article();
        $article->title = $attributes['title'];
        $article->content = $attributes['content'];
        $article->user_id = $attributes['user_id'];

        array_push($this->articles, $article);
        return $article;
    }
    public function getById($id){}
    public function getAll()
    {
        return $this->articles;
    }
    public function update($id, array $attributes){}
    public function delete($id){}
}

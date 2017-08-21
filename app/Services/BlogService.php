<?php
namespace App\Services;

use App\Article;
use App\Repositories\ArticleRepository;
use App\Repositories\CommentRepository as CommentRepo;

class BlogService 
{
    private $articleRepo;
    private $commentRepo;

    public function __construct(ArticleRepository $articleRepo, CommentRepo $commentRepo)
    {
        $this->articleRepo = $articleRepo;
        $this->commentRepo = $commentRepo;
    }

    public function saveArticle(array $attributes)
    {   
        return $this->articleRepo->create($attributes);
    }

    public function getAllArticles()
    {
       $articles = $this->articleRepo->getAll();
       return $articles;
    }

    public function getArticleById($id)
    {
        return $this->articleRepo->getById($id);
    }

    public function deleteArticle($id)
    {
        $this->articleRepo->delete($id);
    }

    public function updateArticle($id, array $attributes)
    {
        $this->articleRepo->update($id, $attributes);
    }

    public function saveComment($attributes)
    {
        return $this->commentRepo->create($attributes);
    }

}
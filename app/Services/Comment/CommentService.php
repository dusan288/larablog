<?php
namespace App\Services\Comment;
use App\Comment;

class CommentService implements ICommentService
{
    private $commentModel;

    public function __construct(Comment $model)
    {
        $this->commentModel = $model;
    }
    public function saveComment($attributes)
    {
        return $this->commentModel->create($attributes);
    }
}
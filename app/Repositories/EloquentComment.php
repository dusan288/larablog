<?php

namespace App\Repositories;

use App\Comment;

class EloquentComment implements CommentRepository 
{   
    private $commentModel;
    public function __construct(Comment $model)
    {
        $this->commentModel = $model;
    }

    public function create(array $attributes)
    {
        $this->commentModel->create($attributes);
    }
}
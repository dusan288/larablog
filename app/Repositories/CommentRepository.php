<?php

namespace App\Repositories;

interface CommentRepository
{
    public function create(array $attributes);
}
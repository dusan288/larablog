<?php

namespace App\Repositories;

interface ArticleRepository
{
    public function create(array $attributes);
    public function getById($id);
    public function getAll();
    public function update($id, array $attributes);
    public function delete($id);
}
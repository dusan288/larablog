<?php
namespace App\Services\Facade;

use Illuminate\Support\Facades\Facade;

class Blog extends Facade 
{
     protected static function getFacadeAccessor() 
     {
          return 'BlogService'; 
    }
}
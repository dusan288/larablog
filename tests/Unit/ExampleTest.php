<?php

namespace Tests\Unit;
use App\Comment;
use App\Services\BlogService;
use App\Repositories\ArticleArray;
use App\Repositories\EloquentComment;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    private $commentModel,
            $articleRepo,
            $commentRepo,
            $blogService;
            /*
    public function __construct()
    {
        $this->commentModel = new Comment();
        $this->articleRepo = new ArticleArray();
        $this->commentRepo = new EloquentComment($this->commentModel);
    } 
    */
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }
    /*
    public function testBlogFacadeCreatesArticle()
    {
        $attr = ['title' => 'MyTitle', 'content' => 'ipsum15', 'user_id' =>1];
        $newArticle = Blog::saveArticle($attr);
        $this->assertEquals('MyTitle', $newArticle->title);
    }
    */
      public function testBlogServiceCreatesArticle()
    {
        $attr = ['title' => 'MyTitle', 'content' => 'ipsum15', 'user_id' =>1];
        $this->commentModel = new Comment();
        $this->articleRepo = new ArticleArray();
        $this->commentRepo = new EloquentComment($this->commentModel);
       
        $this->blogService = new BlogService($this->articleRepo,$this->commentRepo);

        $newArticle = $this->blogService->saveArticle($attr);
        $this->assertEquals('MyTitle', $newArticle->title);
    }

 
    public function testBlogServiceReturnsAllArticles()
    {
       $attr = ['title' => 'MyTitle', 'content' => 'ipsum15', 'user_id' =>1];
        $this->commentModel = new Comment();
        $this->articleRepo = new ArticleArray();
        $this->commentRepo = new EloquentComment($this->commentModel);
       
        $this->blogService = new BlogService($this->articleRepo,$this->commentRepo);

       $attr = ['title' => 'MyTitle', 'content' => 'ipsum15', 'user_id' =>1];
        $this->commentModel = new Comment();
        $this->articleRepo = new ArticleArray();
        $this->commentRepo = new EloquentComment($this->commentModel);
       
        $this->blogService = new BlogService($this->articleRepo,$this->commentRepo);

        $newArticle = $this->blogService->saveArticle($attr);
        //insert again
        $newArticle = $this->blogService->saveArticle($attr);

        $articles = $this->blogService->getAllArticles();
        $this->assertEquals(1, count($articles));
    }

}


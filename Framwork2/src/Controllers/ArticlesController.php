<?php
namespace Controllers;

use View\View;
use Models\Articles\Article;
use Models\Users\User;
use Models\Comments\Comment;
use Services\Db;

class ArticlesController{
    private $view;
    public function __construct(){
        $this->view = new View(__DIR__ . '/../../templates');
    }
    public function view(int $id){
        $users = User::findAll();
        $article = Article::getById($id);
        $comments = Comment::findAllWhere('article_id', $id);
        
        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $this->view->renderHtml('articles/view.php', ['article' => $article, 'comments' => $comments, 'users' => $users]);
    }

    public function edit(int $id){
        $article = Article::getById($id);
        $this->view->renderHtml('articles/edit.php', ['article' => $article]);
    }

    public function add(int $id){
        $article = Article::getById($id);
        $article->setName($_POST['name']);
        $article->setText($_POST['text']);
        $user = User::getById($_POST['author_id']); /////
        $article->setAuthorId($user);
        $article->save();
        $this->view($id);
    }

    public function delete(int $id){
        $article = Article::getById($id);
        $article->break();
    }

    public function create(){
        $users = User::findAll();
        $this->view->renderHtml('articles/create.php', ['users' => $users]);
    }

    public function store(){
        $user = User::getById($_POST['authorId']);
        $article = new Article();
        $article->setAuthorId($user);
        $article->setName($_POST['name']);
        $article->setText($_POST['text']);
        $article->save();
    }
}

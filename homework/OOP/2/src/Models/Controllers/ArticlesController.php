<?php
namespace Models\Controllers;

use Models\View\View;
use Models\Articles\Article;
use Models\Users\User;
use Models\Users\UsersAuthService;

class ArticlesController
{
    /** @var View */
    private $view;
    /** @var User|null */
    private $user;

    public function __construct()
    {
        $this->user = UsersAuthService::getUserByToken();
        $this->view = new View(__DIR__ . '/../../Templates');
        $this->view->setVar('user', $this->user);
    }

    public function checkArticle(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $comments = $article->getComments();
        $this->view->renderHtml('articles/view.php', ['article' => $article, 'comments' => $comments]);
    }

    public function editArticle(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $user = $article->getAuthor();
        $this->view->renderHtml('articles/edit.php', ['article' => $article, 'article_user' => $user]);
        return;
    }

    public function createArticle(): void
    {
        if ($_POST) {
            $author = User::getById($this->user->getId());

            $article = new Article();
            $article->setAuthor($author);
            $article->setName($_POST['title']);
            $article->setText($_POST['text']);
            $article->saveData();

            header('Location: /PHP_Labs/homework/OOP/2/');
            exit; 
        }
        $this->view->renderHtml('articles/create.php');
    }

    public function deleteArticle(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->delete();

        header('Location: /PHP_Labs/homework/OOP/2/');
        exit;
    }

    public function updateArticle(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->setName($_POST['title']);
        $article->setText($_POST['text']);
        $article->saveData();

        header("Location: /PHP_Labs/homework/OOP/2/articles/check/{$articleId}");
        exit;
    }


}
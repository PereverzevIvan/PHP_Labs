<?php
namespace Models\Controllers;

use Models\View\View;
use Models\Articles\Article;
use Models\Users\User;
use Services\Db;

class ArticlesController
{
    /** @var View */
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../Templates');
    }

    public function checkArticle(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $user = $article->getAuthor();
        $this->view->renderHtml('articles/view.php', ['article' => $article, 'user' => $user]);
    }

    public function editArticle(int $articleId)
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $user = $article->getAuthor();
        $this->view->renderHtml('articles/edit.php', ['article' => $article, 'user' => $user]);
    }

    public function createArticle(): void
    {
        $author = User::getById(1);

        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');
        $article->saveData();

        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function deleteArticle(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        $article->delete();

        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
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

        $user = $article->getAuthor();
        $this->view->renderHtml('articles/view.php', ['article' => $article, 'user' => $user]);
    }


}
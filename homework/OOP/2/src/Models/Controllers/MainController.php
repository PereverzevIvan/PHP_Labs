<?php
namespace Models\Controllers;

use Models\View\View;
use Models\Users\User;
use Models\Articles\Article;
use Models\Users\UsersAuthService;

class MainController
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

    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
            'user' => UsersAuthService::getUserByToken()
        ]);
    }

    public function sayHello(string $name)
    {
        $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => 'Приветствие']);
    }

    public function sayBye(string $name) {
        $this->view->renderHtml('main/bye.php', ['name' => $name, 'title' => 'Прощание']);
    }
}
?>
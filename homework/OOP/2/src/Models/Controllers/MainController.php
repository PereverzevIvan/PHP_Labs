<?php
namespace Models\Controllers;

use Models\View\View;
use Models\Articles\Article;
use Services\Db;

class MainController
{
     /** @var View */
     private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../Templates');
    }

    public function main()
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
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
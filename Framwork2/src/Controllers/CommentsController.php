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

    public function commentView(int $id){
        $comment = Comment::getById($id);
        if ($comment === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $this->view->renderHtml('comments/view.php', ['comment' => $comment]);
    }

    public function commentEdit(int $id){
        $users = User::findAll();
        $comment = Comment::getById($id);
        $this->view->renderHtml('comments/edit.php', ['comment' => $comment, 'users' => $users]);
    }

    public function commentAdd(int $id){
        var_dump($_POST['comment']);

        $comment = Comment::getById($id);
        $comment->setDate($_POST['date']);
        $comment->setComment($_POST['comment']);
        $article->setAuthorId($_POST['authorId']);
        var_dump($comment);
        
        // $article = Article::getById($_POST['article_id']);
        // $user = User::getById($_POST['author_id']);
        // $comment->setArticleId($article);
        // $comment->setAuthorId($user);
        $comment->save();
        $this->commentView($id);
    }

    // public function commentСreate(){
    //     $comment = Comment::getById($id);
    //     $this->view->renderHtml('comments/create.php', ['comment' => $comment]);
    // }

    public function commentStore(){
        // $article = Article::getById($_POST['articleId']);
        // $user = User::getById($_POST['authorId']);
        $comment = new Comment();
        $comment->setComment($_POST['comment']);
        $article->setAuthorId($_POST['authorId']);
        var_dump($_POST['articleId']);
        // $comment->setDate($_POST['date']);
        $comment->setArticleId($_POST['articleId']);
        var_dump($_POST['comment']);
        $comment->save();
    }

    public function commentDelete(int $id){
        $comment = Comment::getById($id);
        var_dump($comment);
        $comment->break();
    }

}
?>
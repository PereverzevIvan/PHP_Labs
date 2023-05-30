<?php
namespace Models\Controllers;

use Models\Comments\Comment;
use Models\Users\UsersAuthService;
use Models\Users\User;
use Models\View\View;


class CommentsController
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
    public function addComment()
    {
        $user = UsersAuthService::getUserByToken();
        if ($_POST and !empty($user)) {
            $comment = new Comment();
            $comment->setArticleId($_POST['articleId']);
            $comment->setText($_POST['text']);
            $comment->setAuthorId($user->getId());
            $comment->saveData();
            $commentId = Comment::findAllWhere('author_id', $user->getId());
            $commentId = end($commentId)->getId();
            header("Location: /PHP_Labs/homework/OOP/2/articles/check/{$_POST['articleId']}#comment-{$commentId}");
            exit();
        }
        else {
            header('Location: /PHP_Labs/homework/OOP/2');
            exit();
        }
    }

    public function deleteComment(int $id) {
        $comment = Comment::getById($id);
        $articleId = $comment->getArticleId();

        if ($comment !== null) {
            $comment->delete();
        }

        header('Location: /PHP_Labs/homework/OOP/2/articles/check/'. $articleId);
        exit;
    }

    public function editComment(int $id) {
        $comment = Comment::getById($id);

        if ($comment === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }

        if ($_POST) {
            $comment->setText($_POST['text']);
            $comment->saveData();
            header('Location: /PHP_Labs/homework/OOP/2/articles/check/'. $comment->getArticleId());
            exit;
        }
        $this->view->renderHtml('comments/edit.php', ['comment' => $comment]);
    }
}
?>
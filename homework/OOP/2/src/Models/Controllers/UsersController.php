<?php
namespace Models\Controllers;

use Models\View\View;
use Models\Users\User;
use Models\Users\UserActivationService;
use Models\Users\UsersAuthService;
use Services\EmailSender;
use Exceptions\InvalidArgumentException;

class UsersController
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

    public function signUp()
    {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
                $user = User::getByEmail($_POST['email']);
                echo $user->getEmail();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }
            if ($user instanceof User) {
                $code = UserActivationService::createActivationCode($user);
                EmailSender::send($user, 'Активация', 'userActivation.php', [
                    'userId' => $user->getId(),
                    'code' => $code
                ]);

                $this->view->renderHtml('users/signUpSuccessful.php', ['userId' => $user->getId(), 'user_code' => $code], 200);
                return;
            }
        }
        $this->view->renderHtml('users/signUp.php');
    }
    public function activate(int $userId, string $activationCode)
    {
        $user = User::getById($userId);
        $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);

        if ($isCodeValid) {
            $user->activate();
            echo 'OK!';
            echo '<br> . <a href="/PHP_Labs/homework/OOP/2/">Главная страница</a>';
        }
    }

    public function login()
    {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /PHP_Labs/homework/OOP/2/');
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }    
        $this->view->renderHtml('users/login.php');
    }

    public function logout() {
        if (isset($_COOKIE['token'])) {
            unset($_COOKIE['token']);
            setcookie('token', null, -1, '/'); 
        }
        header('Location: /PHP_Labs/homework/OOP/2/');
        exit();
    }
}
<?php
    return [
        '~^users/register$~' => [Models\Controllers\UsersController::class, 'signUp'],
        '~^users/logout$~' => [Models\Controllers\UsersController::class, 'logout'],
        '~^users/login$~' => [Models\Controllers\UsersController::class, 'login'],
        '~^users/(\d+)/activate/(.+)$~' => [Models\Controllers\UsersController::class, 'activate'],
        '~^articles/check/(\d+)$~' => [Models\Controllers\ArticlesController::class, 'checkArticle'],
        '~^articles/edit/(\d+)$~' => [Models\Controllers\ArticlesController::class, 'editArticle'],
        '~^articles/update/(\d+)$~' => [Models\Controllers\ArticlesController::class, 'updateArticle'],
        '~^articles/comments/create$~' => [Models\Controllers\CommentsController::class, 'addComment'],
        '~^articles/comments/delete/(\d+)$~' => [Models\Controllers\CommentsController::class, 'deleteComment'],
        '~^articles/comments/edit/(\d+)$~' => [Models\Controllers\CommentsController::class, 'editComment'],
        '~^articles/delete/(\d+)$~' => [Models\Controllers\ArticlesController::class, 'deleteArticle'],
        '~^articles/create$~' => [Models\Controllers\ArticlesController::class, 'createArticle'],
        '~^bye/(.*)$~' => [Models\Controllers\MainController::class, 'sayBye'],
        '~^hello/(.*)$~' => [Models\Controllers\MainController::class, 'sayHello'],
        '~^$~' => [Models\Controllers\MainController::class, 'main'],
    ];
?>
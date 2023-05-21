<?php
    return [
        '~^articles/check/(\d+)$~' => [Models\Controllers\ArticlesController::class, 'checkArticle'],
        '~^articles/edit/(\d+)$~' => [Models\Controllers\ArticlesController::class, 'editArticle'],
        '~^articles/update/(\d+)$~' => [Models\Controllers\ArticlesController::class, 'updateArticle'],
        '~^articles/delete/(\d+)$~' => [Models\Controllers\ArticlesController::class, 'deleteArticle'],
        '~^articles/create$~' => [Models\Controllers\ArticlesController::class, 'createArticle'],
        '~^bye/(.*)$~' => [Models\Controllers\MainController::class, 'sayBye'],
        '~^hello/(.*)$~' => [Models\Controllers\MainController::class, 'sayHello'],
        '~^$~' => [Models\Controllers\MainController::class, 'main'],
    ];
?>
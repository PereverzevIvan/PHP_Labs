<?php
return [
    '~^$~' => [\Controllers\MainController::class, 'main'],
    '~^hello/(.*)$~' => [\Controllers\MainController::class, 'sayHello'],
    '~^articles/view/(\d+)$~' => [\Controllers\ArticlesController::class, 'view'],
    '~^articles/edit/(\d+)$~' => [\Controllers\ArticlesController::class, 'edit'],
    '~^articles/add/(\d+)$~' => [\Controllers\ArticlesController::class, 'add'],
    '~^articles/delete/(\d+)$~' => [\Controllers\ArticlesController::class, 'delete'],
    '~^articles/create$~' => [\Controllers\ArticlesController::class, 'create'],
    '~^articles/store$~' => [\Controllers\ArticlesController::class, 'store'],
    '~^comments/(\d+)$~' => [\Controllers\CommentsController::class, 'commentView'],
    '~^comments/edit/(\d+)$~' => [\Controllers\CommentsController::class, 'commentEdit'],
    '~^comments/add/(\d+)$~' => [\Controllers\CommentsController::class, 'commentAdd'],
    '~^comments/store$~' => [\Controllers\CommentsController::class, 'commentStore'],
    '~^comments/delete/(\d+)$~' => [\Controllers\ArticlesController::class, 'commentDelete'],
];

<?php

return [
    'home' => ['url' => '/', 'method' => 'GET', 'controller' => 'home', 'action' => 'index'],

    'roomDetail' => ['url' => '/room/:room', 'method' => 'GET', 'controller' => 'room', 'action' => 'detail'],
    'ajaxRoomAdd' => ['url' => '/ajax/room/add', 'method' => 'POST', 'controller' => 'room', 'action' => 'ajaxAdd', 'guard' => true],

    'userLogin' => ['url' => '/login', 'method' => 'GET', 'controller' => 'user', 'action' => 'login'],
    'userLogout' => ['url' => '/logout', 'method' => 'GET', 'controller' => 'user', 'action' => 'logout', 'guard' => true],
    'userRegister' => ['url' => '/register', 'method' => 'GET', 'controller' => 'user', 'action' => 'register'],

    'ajaxLogin' => ['url' => '/ajax/login', 'method' => 'POST', 'controller' => 'user', 'action' => 'ajaxLogin'],
    'ajaxRegister' => ['url' => '/ajax/register', 'method' => 'POST', 'controller' => 'user', 'action' => 'ajaxRegister'],

    'questionAdd' => ['url' => '/room/:room/question/add', 'method' => 'GET', 'controller' => 'question', 'action' => 'add'],
    'questionAnswer' => ['url' => '/question/:question/answer', 'method' => 'GET', 'controller' => 'question', 'action' => 'answer', 'guard' => true],

    'ajaxQuestionAdd' => ['url' => '/question/add', 'method' => 'POST', 'controller' => 'question', 'action' => 'ajaxAdd'],
    'ajaxQuestionAnswer' => ['url' => '/question/answer', 'method' => 'POST', 'controller' => 'question', 'action' => 'ajaxAnswer', 'guard' => true],
    'ajaxQuestionReact' => ['url' => '/question/:id/:action', 'method' => 'GET', 'controller' => 'question', 'action' => 'ajaxReact'],
];

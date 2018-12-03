<?php

$static_routes = [
    # every route path should end with a slash
    null                    => ['controller' => 'NotFoundController',
                                'action'     => 'notFoundAction'],
    '/'                     => ['controller' => 'IndexController',
                                'action'     => 'indexPageAction'],
    '/login/'               => ['controller' => 'LoginController',
                                'action'     => 'loginPageAction'],
    '/login/auth/'          => ['controller' => 'LoginController',
                                'action'     => 'loginAuthAction'],
    '/logout/'              => ['controller' => 'LoginController',
                                'action'     => 'logoutAction'],
    '/register/'            => ['controller' => 'LoginController',
                                'action'     => 'registerAction'],
    '/user/'                => ['controller' => 'UserController',
                                'action'     => 'userPageAction'],
    '/user/edit/'           => ['controller' => 'UserController',
                                'action'     => 'userEditAction'],
    '/user/save/'           => ['controller' => 'UserController',
                                'action'     => 'userSaveAction'],
    '/user/resetpassword/'  => ['controller' => 'UserController',
                                'action'     => 'resetPasswordAction'],
];

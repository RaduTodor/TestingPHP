<?php
$routes = [
'/page/about-us' => ['controller' => 'PageController',
                     'action' => 'aboutUsAction'],
      '/user/{id}' => ['controller' => 'UserController',
                       'action' => 'showAction']
];
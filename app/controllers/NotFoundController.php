<?php

namespace App\controllers;

class NotFoundController
{
    public function notFoundAction(array $params, array $query) {
        header("Location: /");
    }
}

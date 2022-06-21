<?php


namespace app\middlewares;

class Auth implements Middleware
{
    public static function handle(): bool
    {
        if (!($isAuth = isset($_SESSION['user']))) {
            $_SESSION['errors'] = 'You have to log in!';
        }
        return $isAuth;
    }
}

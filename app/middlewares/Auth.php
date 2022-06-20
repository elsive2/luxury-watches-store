<?php


namespace app\middlewares;

class Auth implements Middleware
{
    public static function handle(): bool
    {
        return isset($_SESSION['user']);
    }
}

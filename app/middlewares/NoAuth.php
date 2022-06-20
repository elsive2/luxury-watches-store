<?php


namespace app\middlewares;


class NoAuth implements Middleware
{
    public static function handle(): bool
    {
        return !isset($_SESSION['user']);
    }
}
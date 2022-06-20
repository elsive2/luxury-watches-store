<?php


namespace app\middlewares;


interface Middleware
{
    public static function handle(): bool;
}
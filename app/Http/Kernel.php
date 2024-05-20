<?php

class Kernel
{
    protected $middleware = [
        \App\Http\Middleware\Cors::class,
    ];

    // Add other class methods and properties here
}
composer require fruitcake/laravel-cors:^2.0.3


// class Kernel
// {
//     protected $middlewareGroups = [
//         \App\Http\Middleware\Cors::class,
//     ];

//     // Add other class methods and properties here
// }
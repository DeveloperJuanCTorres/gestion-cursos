<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->validateCsrfTokens(except: [
            'http://127.0.0.1:8000/students/store',
            'http://127.0.0.1:8000/students/update',
            'http://127.0.0.1:8000/students/search',
            'http://127.0.0.1:8000/students/delete',
            'http://127.0.0.1:8000/courses/store',
            'http://127.0.0.1:8000/courses/update',
            'http://127.0.0.1:8000/courses/search',
            'http://127.0.0.1:8000/courses/delete',
            'http://127.0.0.1:8000/course_student/store',
            'http://127.0.0.1:8000/course_student/update',
            'http://127.0.0.1:8000/course_student/search',
            'http://127.0.0.1:8000/course_student/delete',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

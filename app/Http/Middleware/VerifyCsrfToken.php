<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
<<<<<<< HEAD
       "*"
=======
        '*'
>>>>>>> bffbf2e8c837eecf7e3dc3c62ffdc8b6f5e61f9a
    ];
}

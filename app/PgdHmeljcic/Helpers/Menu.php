<?php

namespace App\PgdHmeljcic\Helpers;

use Illuminate\Support\Facades\Route;

class Menu
{
    public function activeMenu($uri = '')
    {
        $active = '';

//        dd(Route::current()->uri);
        if (starts_with(Route::current()->uri, $uri)) {
            $active = 'active';
        }

        return $active;
    }

    public function activeNavbar()
    {
        if(Route::current()->uri != '/')
            return "white-force";

        return "";
    }
}
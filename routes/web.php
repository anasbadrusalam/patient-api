<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return [
        'Author' => 'Anas Badru Salam',
        'Laravel' => app()->version()
    ];
});

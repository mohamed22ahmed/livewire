<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($isbn13, $slug, $condition = null){
        return 'book';
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class HomeController extends ApiController
{
    public function index()
    {
        abort(405);
    }
}

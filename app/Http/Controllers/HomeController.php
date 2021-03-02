<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Urls;

class HomeController extends Controller
{
    public function main(): object
    {
        return view('main');
    }
}

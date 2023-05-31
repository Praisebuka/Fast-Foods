<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class forCheckController extends Controller
{
    public function __invoke() {
        return view('auth.verify-email');
    }
}

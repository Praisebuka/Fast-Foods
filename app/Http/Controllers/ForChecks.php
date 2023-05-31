<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForChecks extends Controller
{
    public function thepath () {
        return view('components.dropdown-link');
    }
}

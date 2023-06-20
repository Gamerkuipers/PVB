<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index() {
        return view('dashboard.about.index');
    }

    public function edit() {
        return view('dashboard.about.edit');
    }
}

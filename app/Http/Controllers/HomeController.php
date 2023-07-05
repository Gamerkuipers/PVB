<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('welcome', [
            'advertisements' => Advertisement::orderByDesc('created_at')->limit(3)->get()
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'advertisements' => Advertisement::orderByDesc('created_by')->limit(3)->get()
        ]);
    }
}

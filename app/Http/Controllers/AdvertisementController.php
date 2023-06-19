<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdvertisementController extends Controller
{
    public function index(): View
    {
        return view('advertisement.index');
    }

    public function show(): View
    {
        return view('advertisement.show');
    }
}

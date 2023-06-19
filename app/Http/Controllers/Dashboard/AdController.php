<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function index(): View
    {
        return view('dashboard.ad.index');
    }

    public function show(): View
    {
        return view('dashboard.ad.show');
    }

    public function create(): View
    {
        return view('dashboard.ad.create');
    }
}

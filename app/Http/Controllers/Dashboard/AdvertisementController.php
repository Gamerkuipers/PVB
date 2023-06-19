<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index(): View
    {
        return view('dashboard.advertisement.index');
    }

    public function show(): View
    {
        return view('dashboard.advertisement.show');
    }

    public function create(): View
    {
        return view('dashboard.advertisement.create');
    }
}

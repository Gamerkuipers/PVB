<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\WebContent;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        return view('dashboard.about.index', [
            'about' => WebContent::firstWhere('key', 'about'),
        ]);
    }

    public function edit(): View
    {
        return view('dashboard.about.edit');
    }
}

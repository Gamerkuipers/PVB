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
        $about = WebContent::firstWhere('key', 'about');

        $this->authorize('view', $about);

        return view('dashboard.about.index', [
            'about' => $about,
        ]);
    }

    public function edit(): View
    {
        $about = WebContent::firstWhere('key', 'about');

        $this->authorize('update', $about);

        return view('dashboard.about.edit', [
            'about' => $about,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Advertisement;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index(): View
    {
        return view('dashboard.advertisement.index', [
            'advertisements' => Advertisement::orderByDesc('created_at')->paginate(10),
        ]);
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

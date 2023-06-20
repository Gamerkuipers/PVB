<?php

namespace App\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdvertisementController extends Controller
{
    public function index(): View
    {
        return view('advertisement.index', [
            'advertisements' => Advertisement::orderByDesc('created_at')->paginate(10)
        ]);
    }

    public function show(): View
    {
        return view('advertisement.show');
    }
}

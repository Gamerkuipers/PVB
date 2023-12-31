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
            'title' => __('All advertisements'),
            'advertisements' => Advertisement::orderByDesc('created_at')->paginate(10),
        ]);
    }

    public function show(Advertisement $advertisement): View
    {
        return view('dashboard.advertisement.show', [
            'advertisement' => $advertisement,
        ]);
    }

    public function create(): View
    {
        return view('dashboard.advertisement.create');
    }

    public function edit(Advertisement $advertisement): View
    {
        return view('dashboard.advertisement.edit', [
            'advertisement' => $advertisement,
        ]);
    }

    public function sold(): View
    {
        return view('dashboard.advertisement.index', [
            'title' => __('All sold advertisements'),
            'advertisements' => Advertisement::onlyTrashed()->orderByDesc('deleted_at')->paginate('10'),
        ]);
    }
}

<?php

namespace App\View\Components;

use App\Models\WebContent;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavigationDashboard extends Component
{
    public WebContent $about;

    public function __construct()
    {
        $this->about = WebContent::firstWhere('key', 'about');
    }

    public function render(): View|Closure|string
    {
        return view('layouts.navigation-dashboard');
    }
}

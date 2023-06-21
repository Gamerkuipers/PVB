<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(): View
    {
        return view('dashboard.contact.index', [
            'contacts' => Contact::all(),
        ]);
    }


    public function edit(): View
    {
        return view('dashboard.contact.edit');
    }
}

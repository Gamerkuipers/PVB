<?php

namespace App\View\Components;

use App\Models\Contact as ModelsContact;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Contact extends Component
{
    public Collection $contacts;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->contacts = ModelsContact::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contact');
    }
}

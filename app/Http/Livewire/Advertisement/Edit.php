<?php

namespace App\Http\Livewire\Advertisement;

use App\Models\Advertisement;
use App\Traits\HasAlerts;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class Edit extends Component
{
    use HasAlerts;

    public Advertisement $advertisement;

    protected array $rules = [
        'advertisement.description' => ['required', 'string', 'max:65535'],
        'advertisement.price' => ['required', 'string', 'max:255'],
        'advertisement.license_plate' => ['required', 'string', 'max:255']
    ];

    protected $listeners = [
        'cancelEditing'
    ];

    public function render(): View
    {
        return view('livewire.advertisement.edit');
    }

    public function confirmCancelEditing()
    {
        $this->alertWarning(__('All unsaved data will be lost if you proceed.'), [
            'timer' => null,
            'position' => 'center',
            'showDenyButton' => true,
            'denyButtonText' => __('Continue'),
            'onDenied' => 'cancelEditing',
            'showCancelButton' => true,
            'cancelButtonText' => __('Nevermind'),
        ]);
    }

    public function cancelEditing(): RedirectResponse|Redirector
    {
        return to_route('dashboard.advertisement.show', $this->advertisement);
    }
}

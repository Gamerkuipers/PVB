<?php

namespace App\Http\Livewire\Advertisement;

use App\Actions\Advertisement\UpdateAdvertisement;
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
        'advertisement.license_plate' => ['required', 'string', 'max:255'],
    ];

    protected $validationAttributes = [
      'advertisement.license_plate' => 'license plate',
    ];

    protected $listeners = [
        'confirmedCancel' => 'cancelEditing'
    ];

    public function render(): View
    {
        return view('livewire.advertisement.edit');
    }

    public function confirmCancelEditing(): void
    {
        $this->cancel(__('All unsaved data will be lost if you proceed.'));
    }

    public function cancelEditing(): RedirectResponse|Redirector
    {
        return to_route('dashboard.advertisement.show', $this->advertisement);
    }

    public function save(UpdateAdvertisement $updater): Redirector|RedirectResponse|null
    {
//        if(!$this->validate()) return null;

        if ($this->advertisement->isClean()
            || $updater->update($this->advertisement)
        ) {
            return $this->flashSuccess(__('Successfully updated advertisement!'), route('dashboard.advertisement.show', $this->advertisement));
        }

        $this->alertWarning(__('Something went wrong. Try again later.'));
        return null;
    }
}

<?php

namespace App\Http\Livewire\About;

use App\Actions\WebContent\UpdateWebContent;
use App\Models\WebContent;
use App\Traits\HasAlerts;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class Edit extends Component
{
    use HasAlerts;

    public WebContent $about;

    protected array $rules = [
        'about.head' => ['required', 'string', 'max:255'],
        'about.body' => ['required', 'string', 'max:65535'],
    ];

    protected array $validationAttributes = [
        'about.head' => 'Title',
        'about.body' => 'Content',
    ];

    protected $listeners = [
      'cancelEditing'
    ];

    public function mount(): void
    {
        $this->about = WebContent::firstWhere('key', 'about');
    }

    public function render(): View
    {
        return view('livewire.about.edit');
    }

    public function save(UpdateWebContent $updater): Redirector|RedirectResponse|null
    {
        $this->validate();
        if ($this->about->isClean() || $updater->update($this->about)) {
            return $this->flashSuccess(__('Successfully saved about.'), route('dashboard.about.index'));
        }

        $this->alertWarning(__('Something went wrong. Try again later.'));

        return null;
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
        return to_route('dashboard.about.index');
    }
}

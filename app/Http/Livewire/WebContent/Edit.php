<?php

namespace App\Http\Livewire\WebContent;

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

    public WebContent $webContent;

    public string $title = '';

    public string $successRouteName = 'dashboard';

    protected array $rules = [
        'webContent.head' => ['required', 'string', 'max:255'],
        'webContent.body' => ['required', 'string', 'max:65535'],
    ];

    protected array $validationAttributes = [
        'webContent.head' => 'Title',
        'webContent.body' => 'Content',
    ];

    protected $listeners = [
      'cancelEditing'
    ];

    public function render(): View
    {
        return view('livewire.web-content.edit');
    }

    public function save(UpdateWebContent $updater): Redirector|RedirectResponse|null
    {
        $this->validate();
        if ($this->webContent->isClean() || $updater->update($this->webContent)) {
            return $this->flashSuccess(__('Successfully saved :title', ['title' => $this->title]), route($this->successRouteName));
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
        return to_route($this->successRouteName);
    }
}

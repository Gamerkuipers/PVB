<?php

namespace App\Traits;

use Illuminate\Http\RedirectResponse;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Redirector;

trait HasAlerts
{
    use LivewireAlert;

    public function alertSuccess(string $message, array $options = []): void
    {
        $this->alert('success', $message, $options);
    }

    public function alertWarning(string $message, array $options = []): void
    {
        $this->alert('warning', $message, $options);
    }

    public function flashSuccess(string $message, string $url, array $options = []): RedirectResponse|Redirector
    {
        return $this->flash('success', $message, $options, $url);
    }
}

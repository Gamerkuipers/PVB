<?php

namespace App\Http\Livewire\Contact;

use App\Actions\Contact\CreateContact;
use App\Actions\Contact\DeleteContact;
use App\Actions\Contact\UpdateContacts;
use App\Models\Contact;
use App\Traits\HasAlerts;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class Edit extends Component
{
    use HasAlerts;

    public Collection $contacts;

    public Collection $contactsToDelete;

    public string $newContactName = '';
    public string $newContactBody = '';

    protected array $rules = [
        'contacts.*.name' => ['string', 'max:255'],
        'contacts.*.body' => ['required', 'string', 'max:255'],
        'newContactName' => ['string', 'max:255'],
        'newContactBody' => ['required', 'string', 'max:255'],
    ];

    protected array $validationAttributes = [
        'contacts.*.name' => 'name',
        'contacts.*.body' => 'content',
        'newContactName' => 'name',
        'newContactBody' => 'content',
    ];

    protected $listeners = [
        'confirmedCancel' => 'cancelEditing',
    ];

    public function mount()
    {
        $this->contacts = Contact::all();
        $this->contactsToDelete = new Collection();
    }

    public function render(): View
    {
        return view('livewire.contact.edit');
    }

    public function saveContacts(UpdateContacts $updater, DeleteContact $deletor): Redirector|RedirectResponse|null
    {
        $this->validateOnly('Contacts');

        if($this->contactsToDelete->isNotEmpty()) {
            $deletor->deleteMany($this->contactsToDelete);
        }

        if($updater->update($this->contacts)) {
            return $this->flashSuccess(__('Successfully updated contacts.'), route('dashboard.contact.index'));
        };

        $this->alertWarning(__('Something went wrong. Try again later.'));

        return null;
    }

    public function deleteContact(int $index): void
    {
        $this->contactsToDelete->push($this->contacts->get($index));

        $this->contacts->forget($index);
    }

    public function addNewContact(CreateContact $creator): void
    {
        $this->validateOnly('newContactName');
        $this->validateOnly('newContactBody');

        $this->contacts->push($creator->create(
            $this->newContactName,
            $this->newContactBody
        ));

        $this->reset([
            'newContactName',
            'newContactBody',
        ]);
    }

    public function confirmCancelEditing()
    {
        $this->cancel(__('All unsaved data will be lost if you proceed.'));
    }

    public function cancelEditing(): RedirectResponse|Redirector
    {
        return to_route('dashboard.contact.index');
    }
}

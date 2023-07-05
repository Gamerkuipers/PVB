<?php

namespace App\Http\Livewire\Advertisement;

use App\Actions\Advertisement\UpdateAdvertisement;
use App\Models\Advertisement;
use App\Models\File;
use App\Traits\HasAlerts;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use HasAlerts,
    WithFileUploads;

    public Advertisement $advertisement;

    public array $currentPreview;

    public Collection $advertisementFiles;

    public SupportCollection $uploadedFiles;

    public Collection $filesToDelete;

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

    public function mount(): void
    {
        $this->currentPreview = $this->advertisement->thumbnail()->toArray();

        $this->advertisementFiles = $this->advertisement->files;

        $this->uploadedFiles = collect();

        $this->filesToDelete = new Collection();
    }

    public function getFilesProperty(): SupportCollection
    {
        return collect($this->advertisementFiles)->merge($this->uploadedFiles);
    }

    public function removeFile($file)
    {
        if(isset($file['id'])) {

        } else {

        }
    }

    public function getFileLocation(File|TemporaryUploadedFile $file): string
    {
        return get_class($file) === File::class ? asset("storage/{$file->location}") : $file->temporaryUrl();
    }

    public function confirmCancelEditing(): void
    {
        $this->cancel(__('All unsaved data will be lost if you proceed.'));
    }

    public function cancelEditing(): RedirectResponse|Redirector
    {
        return to_route('dashboard.advertisement.show', $this->advertisement);
    }

    public function setCurrentPreview($file): void
    {
        $this->currentPreview = $file;
    }

    public function removeImage(File|TemporaryUploadedFile $file)
    {
        if(get_class($file) == File::class) {
            $this->filesToDelete->push($file);
        } else {

        }
    }

    public function save(UpdateAdvertisement $updater): Redirector|RedirectResponse|null
    {
       $this->validate();

        if ($this->advertisement->isClean()
            || $updater->update($this->advertisement)
        ) {
            return $this->flashSuccess(__('Successfully updated advertisement!'), route('dashboard.advertisement.show', $this->advertisement));
        }

        $this->alertWarning(__('Something went wrong. Try again later.'));

        return null;
    }
}

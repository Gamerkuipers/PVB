<?php

namespace App\Http\Livewire\Advertisement;

use App\Actions\Advertisement\UpdateAdvertisement;
use App\Models\Advertisement;
use App\Models\File;
use App\Traits\HasAlerts;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
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

    public $currentPreview;

    public Collection $advertisementFiles;

    public $uploadedFiles = [];

    public $newFileUploads = [];

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
        $this->currentPreview = $this->advertisement->thumbnail();

        $this->advertisementFiles = $this->advertisement->files;

        $this->filesToDelete = new Collection();
    }

    public function getFilesProperty(): \Illuminate\Support\Collection
    {
        return collect($this->advertisementFiles)->merge($this->uploadedFiles);
    }

    public function removeFile(File $file): void
    {
        $this->filesToDelete->push($file);

        $this->advertisementFiles->forget($this->advertisementFiles->where('id', $file['id'])->keys()->all());

        if ($file['id'] === $this->currentPreview['id'] ?? null) $this->resetCurrentPreview();
    }

    public function removeTempFile(string $fileName): void
    {
        $file = $this->uploadedFiles[$fileName];

        $file->delete();

        unset($this->uploadedFiles[$fileName]);

        if($this->currentPreview::class === TemporaryUploadedFile::class
            && $this->currentPreview->getFileName() === $fileName
        ) $this->resetCurrentPreview();
    }

    public function getFileLocation(File $file): string
    {
        return asset("storage/{$file->location}");

    }

    public function confirmCancelEditing(): void
    {
        $this->cancel(__('All unsaved data will be lost if you proceed.'));
    }

    public function cancelEditing(): RedirectResponse|Redirector
    {
        return to_route('dashboard.advertisement.show', $this->advertisement);
    }

    public function resetCurrentPreview(): void
    {
        $this->currentPreview = $this->files->first();
    }

    public function setCurrentPreview(File $file): void
    {
        $this->currentPreview = $file;
    }

    public function setCurrentPreviewTemp(string $fileName): void
    {
        $this->currentPreview = $this->uploadedFiles[$fileName];
    }

    public function updatedNewFileUploads(): void
    {
        $hasError = false;

        $validator = Validator::make([], [
            'file' => ['image', 'max:10240'],
        ]);

        foreach ($this->newFileUploads as $file) {
            if ($validator->setData(['file' => $file])->valid()) {
                $this->uploadedFiles[$file->getFileName()] = $file;
            } else {
                $hasError = true;
            }
        }

        if ($hasError) {
            $this->addError('newFileUploads', __('Some images were unable to upload.'));
        }

        $this->reset(['newFileUploads']);
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

<?php

namespace App\Http\Livewire\Advertisement;

use App\Actions\Advertisement\UpdateAdvertisement;
use App\Models\Advertisement;
use App\Models\File;
use App\Traits\HasAlerts;
use App\Traits\HasRDW;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection as SupportCollection;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Str;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class Edit extends Component
{
    use HasAlerts,
        HasRDW,
        WithFileUploads;

    public Advertisement $advertisement;

    public SupportCollection $extras;

    public $currentPreview;

    public Collection $advertisementFiles;

    public $uploadedFiles = [];

    public $newFileUploads = [];

    public Collection $filesToDelete;

    public bool $isSold = false;

    protected array $rules = [
        'advertisement.description' => ['required', 'string', 'max:65535'],
        'advertisement.price' => ['required', 'string', 'max:255'],
        'advertisement.license_plate' => ['required', 'string', 'max:255'],
        'extras.*' => ['sometimes', 'required', 'string', 'max:255'],
    ];

    protected $validationAttributes = [
        'advertisement.license_plate' => 'license plate',
    ];

    protected $listeners = [
        'confirmedCancel' => 'cancelEditing',
    ];

    public function render(): View
    {
        if (!$this->currentPreview) $this->resetCurrentPreview();

        return view('livewire.advertisement.edit');
    }

    public function mount(): void
    {
        $this->isSold = $this->advertisement->trashed();

        $this->extras = $this->advertisement->extras;

        $this->currentPreview = $this->advertisement->thumbnail();

        $this->advertisementFiles = $this->advertisement->files;

        $this->filesToDelete = new Collection();
    }


    public function updatedAdvertisementLicensePlate(): void
    {
        $this->advertisement->license_plate = strtoupper($this->advertisement->license_plate);
        $this->getCarData();
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

        if ($this->currentPreview::class === TemporaryUploadedFile::class
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

    public function removeExtra(int $index): void
    {
        $this->extras->forget($index);
        $this->extras = $this->extras->values();
    }


    public function getCarData(): void
    {
        $this->resetErrorBag('advertisement.license_plate');

        $this->validateOnly('advertisement.license_plate');

        $data = $this->getDataOnLicensePlate($this->advertisement->license_plate);

        if (!isset($data[0])) {
            $this->addError('advertisement.license_plate', __('No information found.'));
            return;
        }

        $data = $data[0];

        $fuelData = $this->getFuelTypeOfLicensePlate($data['kenteken']);

        $this->advertisement->brand = $data['merk'] ?? 'N/A';
        $this->advertisement->name = $data['handelsbenaming'] ?? 'N/A';
        $this->advertisement->type = $data['type'] ?? 'N/A';
        $this->advertisement->license_plate = $data['kenteken'] ?? 'N/A';
        $this->advertisement->build_year =
            isset($data['datum_eerste_toelating_dt'])
                ? Carbon::create($data['datum_eerste_toelating_dt'])->format('Y')
                : 'N/A';
        $this->advertisement->color =
            $data['tweede_kleur'] !== 'Niet geregistreerd'
                ? $data['tweede_kleur']
                : ($data['eerste_kleur'] !== 'Niet geregistreerd'
                ? $data['eerste_kleur']
                : 'N/A');
        $this->advertisement->doors = $data['aantal_deuren'] ?? 'N/A';
        $this->advertisement->seating = $data['aantal_zitplaatsen'] ?? 'N/A';
        $this->advertisement->apk_expire_date =
            isset($data['vervaldatum_apk_dt'])
                ? Carbon::create($data['vervaldatum_apk_dt'])->format('Y M')
                : 'N/A';
        $this->advertisement->kilometer = $data['tellerstandoordeel'] ?? 'N/A';
        $this->advertisement->fuel = $fuelData['brandstof_omschrijving'] ?? 'N/A';
        $this->advertisement->btw = $data['wam_verzekerd'] ?? 'N/A';
        $this->advertisement->power = $data['vermogen_massarijklaar'] ?? 'N/A';
        $this->advertisement->weight = $data['massa_rijklaar'] ?? 'N/A';
        $this->advertisement->fuel_usage = $fuelData['brandstofverbruik_gecombineerd'] ?? 'N/A';
        $this->advertisement->cylinder_capacity = $data['cilinderinhoud'] ?? 'N/A';
    }

    public function save(UpdateAdvertisement $updater): Redirector|RedirectResponse|null
    {
        $this->validate();

        $this->advertisement->extras = $this->extras;

        if (($this->advertisement->isClean()
                && empty($this->uploadedFiles)
                && $this->filesToDelete->isEmpty()
                && $this->advertisement->trashed() === $this->isSold)
            || $updater->update($this->advertisement, $this->isSold, $this->filesToDelete, $this->uploadedFiles)
        ) {
            return $this->flashSuccess(__('Successfully updated advertisement!'), route('dashboard.advertisement.show', $this->advertisement));
        }

        $this->alertWarning(__('Something went wrong. Try again later.'));

        return null;
    }
}

<?php

namespace App\Http\Livewire\Advertisement;

use App\Actions\Advertisement\CreateAdvertisement;
use App\Traits\HasAlerts;
use App\Traits\HasRDW;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class Create extends Component
{
    use HasAlerts,
        HasRDW;

    public string $licensePlate = '';

    public string $title = '';

    public string $price = '';

    public array $carData = [
        'brand' => 'N/A',
        'name' => 'N/A',
        'type' => 'N/A',
        'license_plate' => 'N/A',
        'build_year' => 'N/A',
        'color' => 'N/A',
        'doors' => 'N/A',
        'seating' => 'N/A',
        'apk_expire_date' => 'N/A',
        'kilometer' => 'N/A',
        'fuel' => 'N/A',
        'btw' => 'N/A',
        'transmission' => 'N/A',
        'power' => 'N/A',
        'weight' => 'N/A',
        'fuel_usage' => 'N/A',
        'cylinder_capacity' => 'N/A',
    ];

    protected array $rules = [
        'licensePlate' => ['required', 'string', 'max:255'],
        'title' => ['required', 'string', 'max:255'],
        'price' => ['required', 'string', 'max:255'],
    ];

    public function render(): View
    {
        return view('livewire.advertisement.create');
    }

    public function updatedLicensePlate(): void
    {
        $this->getCarData();
    }

    public function getCarData(): void
    {
        $this->resetErrorBag('licensePlate');

        $data = $this->getDataOnLicensePlate($this->licensePlate);

        if (!isset($data[0])) {
            $this->reset(['carData']);
            $this->addError('licensePlate', __('No information found.'));
            return;
        }

        $data = $data[0];

        $fuelData = $this->getFuelTypeOfLicensePlate($data['kenteken']);

        $this->carData['brand'] = $data['merk'] ?? 'N/A';
        $this->carData['name'] = $data['handelsbenaming'] ?? 'N/A';
        $this->carData['type'] = $data['type'] ?? 'N/A';
        $this->carData['license_plate'] = $data['kenteken'] ?? 'N/A';
        $this->carData['build_year'] = Carbon::create($data['datum_eerste_toelating_dt'])->format('Y');
        $this->carData['color'] =
            $data['tweede_kleur'] !== 'Niet geregistreerd'
                ? $data['tweede_kleur']
                : ($data['eerste_kleur'] !== 'Niet geregistreerd'
                ? $data['eerste_kleur']
                : 'N/A');
        $this->carData['doors'] = $data['aantal_deuren'] ?? 'N/A';
        $this->carData['seating'] = $data['aantal_zitplaatsen'] ?? 'N/A';
        $this->carData['apk_expire_date'] = Carbon::create($data['vervaldatum_apk_dt'])->format('Y M');
        $this->carData['kilometer'] = $data['tellerstandoordeel'] ?? 'N/A';
        $this->carData['fuel'] = $fuelData['brandstof_omschrijving'] ?? 'N/A';
        $this->carData['btw'] = $data['wam_verzekerd'] ?? 'N/A';
//        $this->carData['transmission']; niet van toe passing
        $this->carData['power'] = $data['vermogen_massarijklaar'] ?? 'N/A';
        $this->carData['weight'] = $data['massa_rijklaar'] ?? 'N/A';
        $this->carData['fuel_usage'] = $fuelData['brandstofverbruik_gecombineerd'] ?? 'N/A';
        $this->carData['cylinder_capacity'] = $data['cilinderinhoud'] ?? 'N/A';
    }

    public function create(CreateAdvertisement $creator): RedirectResponse|Redirector|null
    {
        $this->validate();

        if($advertisement = $creator->create($this->title, $this->price, $this->carData)) {
            return $this->flashSuccess(__('Successfully created advertisement!'), route('dashboard.advertisement.show', $advertisement));
        }

        $this->alertWarning(__('Something went wrong. Try again later.'));

        return null;
    }
}

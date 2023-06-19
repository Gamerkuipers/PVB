<?php

namespace App\View\Components\Advertisement\Card;

use App\Models\Advertisement;
use App\Models\File;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Horizontal extends Component
{
    public Advertisement $advertisement;

    public File $thumbnail;
    /**
     * Create a new component instance.
     */
    public function __construct($advertisement)
    {
        $this->advertisement = $advertisement;
        $this->thumbnail = $this->advertisement->files->firstWhere('thumbnail');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {


        return view('components.advertisement.card.horizontal');
    }
}

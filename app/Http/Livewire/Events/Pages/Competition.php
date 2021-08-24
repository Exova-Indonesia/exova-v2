<?php

namespace App\Http\Livewire\Events\Pages;

use Livewire\Component;
use App\Http\Traits\Download;
use App\Models\PhotoCompetition;
use App\Models\Competition as Comp;

class Competition extends Component
{
    use Download;

    public function downloadCert()
    {
        $data = PhotoCompetition::where('user_id', auth()->user()->id)->first();
        return $this->certificateDownload($data->certificate);
    }

    public function render()
    {
        return view('livewire.events.pages.competition', [
            'competition' => Comp::all(),
        ]);
    }
}

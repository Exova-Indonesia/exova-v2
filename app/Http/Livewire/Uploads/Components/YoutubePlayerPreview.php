<?php

namespace App\Http\Livewire\Uploads\Components;

use Livewire\Component;

class YoutubePlayerPreview extends Component
{

    public $urls;
    protected $listeners = ["updateYoutubePreview"];

    public function updateYoutubePreview($urls)
    {
        $this->urls = $urls;
    }

    public function render()
    {
        return view('livewire.uploads.components.youtube-player-preview');
    }
}

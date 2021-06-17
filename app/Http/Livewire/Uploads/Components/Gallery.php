<?php

namespace App\Http\Livewire\Uploads\Components;

use Livewire\Component;
use Livewire\WithFileUploads;

class Gallery extends Component
{
    use WithFileUploads;

    public $pictures;
    public $urlyoutube;
    public $parsedUrlyoutube;
    public $success = false;
    public function urlyoutube()
    {
        try {
            $data = explode('/', $this->urlyoutube);
            (! $data[3] || strlen($data[3]) !== 11) ? $parsedUrlyoutube == "error" :
            $this->parsedUrlyoutube = $data[3];
            $this->success = true;
        } catch (\Throwable $th) {
            $this->parsedUrlyoutube = "Error, Please use another url";
        }
    }
    public function render()
    {
        return view('livewire.uploads.components.gallery');
    }
}

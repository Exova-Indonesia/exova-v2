<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;

class UploadFileContracts extends Component
{
    public $files;
    public function render()
    {
        return view('livewire.components.upload-file-contracts');
    }
}

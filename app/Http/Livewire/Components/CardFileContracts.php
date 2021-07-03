<?php

namespace App\Http\Livewire\Components;

use App\Models\Message;
use Livewire\Component;
use App\Http\Traits\Download;
use Livewire\WithFileUploads;
use App\Http\Traits\UploadFiles;
use Illuminate\Support\Facades\Storage;

class CardFileContracts extends Component
{
    use WithFileUploads, UploadFiles, Download;
    public $data;
    public $directory;
    public $files;
    public $filesName;
    public $old_name;
    public $size;
    public $ext;
    public $revisionModal = false;

    protected $listeners = ["reloadData" => 'render'];

    public function mount($data)
    {
        $this->data = $data;
        $this->directory = 'contracts/' . $data['id'];
    }

    public function submitFiles()
    {
        if($this->files) {
            $this->filesName = uniqid();
            $this->old_name = $this->files->getClientOriginalName();
            $this->size = $this->files->getSize();
            $this->ext = $this->files->getClientOriginalExtension();
            $this->storeFilesContract();
        } else {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Upload dong dulu filenya baru save, hmm']);
        }
    }

    public function reqReturn()
    {
        $this->revisionModal = true;
    }

    public function reloadData($data)
    {
        $this->data = $data;
    }

    public function downloadFileContract($file)
    {
        return $this->download($file);
    }

    public function render()
    {
        return view('livewire.components.card-file-contracts');
    }
}

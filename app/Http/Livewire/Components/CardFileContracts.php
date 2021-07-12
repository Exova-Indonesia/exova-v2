<?php

namespace App\Http\Livewire\Components;

use App\Models\Message;
use Livewire\Component;
use App\Models\Contract as Cntr;
use App\Http\Traits\Contract;
use App\Events\ContractEvent;
use App\Http\Traits\Download;
use Livewire\WithFileUploads;
use App\Http\Traits\UploadFiles;
use Illuminate\Support\Facades\Storage;

class CardFileContracts extends Component
{
    use WithFileUploads, UploadFiles, Download, Contract;
    public $data;
    public $directory;
    public $files;
    public $filesName;
    public $old_name;
    public $size;
    public $ext;
    public $return_description;
    public $revisionModal = false;

    public $trollMsg = "Sabar ya, Lagi download bentar aja kok";

    protected $listeners = ["reloadData" => 'render'];

    public function mount($data)
    {
        $this->data = $data;
        $this->directory = 'contracts/' . $data['id'];
    }

    public function gamau()
    {
        $this->trollMsg = "Ih kok gamau lo?, Dibilangin tunggu bentar aja";
    }

    public function yaudah()
    {
        $this->trollMsg = "Nah gitu dong, Bentar aja kok ga lama";
    }

    public function submitFiles()
    {
        if($this->files) {
            $this->filesName = uniqid();
            $this->old_name = $this->files->getClientOriginalName();
            $this->size = $this->files->getSize();
            $this->ext = $this->files->getClientOriginalExtension();
            $this->storeFilesContract();
            $cntr = Cntr::where('id', $this->data['id'])->first();
            event(new ContractEvent($cntr));
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

    public function approveFiles()
    {
        $this->approve();
    }

    public function sendRequest()
    {
        $this->requestReturn();
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

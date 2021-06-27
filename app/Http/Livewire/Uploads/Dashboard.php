<?php

namespace App\Http\Livewire\Uploads;

use Livewire\Component;

class Dashboard extends Component
{
    public $namaproject;
    public $page = 1;
    public $timeline = [];
    protected $listeners = ["namaproject", "nextPage"];
    
    public function mount()
    {
        $this->timeline = [
            [
                'page' => 1,
                'title' => "Details"
            ],
            [
                'page' => 2,
                'title' => "Gallery"
            ],
            [
                'page' => 3,
                'title' => "Pricing"
            ],
            [
                'page' => 4,
                'title' => "Publish & Share"
            ],
        ];
    }

    public function namaproject($e)
    {
        $this->namaproject = $e;
    }
    
    public function continue()
    {
        switch ($this->page) {
            case 1:
                $this->emit("updateDetails");
                break;
            
            case 2:
                $this->emit("updateGallery");
                break;
            
            case 3:
                $this->emit("updatePricing");
                break;
            
            case 4:
                try {
                    $this->emit("updatePublish");
                    $this->closeModal();
                } catch (\Throwable $th) {
                    throw $th;
                }
                break;
            
            default:
                # code...
                break;
        }
    }

    public function nextPage()
    {
        $this->page = $this->page + 1;
    }

    public function previousPage()
    {
        $this->page = $this->page - 1;
    }

    public function closeModal()
    {
        $this->emit("closeModal");
    }
    public function render()
    {
        return view('livewire.uploads.dashboard');
    }
}

<?php

namespace App\Http\Livewire\Events\Pages;

use App\Models\Webinar;
use Livewire\Component;
use App\Models\WebinarAttendant as WT;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AttendantWebinarThanks;

class WebinarAttendant extends Component
{
    public $webinar;
    public $name;
    public $email;
    public $instansi;
    public $status = 2;

    protected $rules = [
        'email' => 'required|email',
        'name' => 'required',
        'instansi' => 'required',
        'status' => 'required',
    ];

    protected $validationAttributes = [
        'name' => 'Nama Lengkap',
        'email' => 'Email',
        'instansi' => 'Instansi',
        'status' => 'Status',
    ];

    public function mount($id)
    {
        $this->webinar = Webinar::where('uuid', $id)->first();
        if(! $this->webinar) {
            abort(404);
        }
    }

    public function setAttendant()
    {
        $this->validate();
        try {
            $attendant = WT::updateOrCreate([
                'email' => $this->email,
                'webinar_id' => $this->webinar['id'],
            ],[
                'webinar_id' => $this->webinar['id'],
                'name' => $this->name,
                'email' => $this->email,
                'instansi' => $this->instansi,
                'status' => $this->status,
            ]);
            Notification::route('mail', $this->email)->notify(new AttendantWebinarThanks($attendant, $this->webinar));
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'success',
            'title' => 'Keren!, Data berhasil disimpan']);
            return redirect(route('event.dashboard'));
        } catch (\Throwable $th) {
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => 'Tidak keren!, Data gagal disimpan']);
        }
    }

    public function render()
    {
        return view('livewire.events.pages.webinar-attendant');
    }
}

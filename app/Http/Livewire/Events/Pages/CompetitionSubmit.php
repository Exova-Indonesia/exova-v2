<?php

namespace App\Http\Livewire\Events\Pages;

use Livewire\Component;
use App\Models\Competition;
use Livewire\WithFileUploads;
use App\Models\PhotoCompetition;

class CompetitionSubmit extends Component
{
    use WithFileUploads;
    public $uuid;
    public $comp;
    public $user;
    public $files;
    public $title;
    public $name;
    public $address;
    public $deskripsi;

    public function mount($id)
    {
        $this->uuid = $id;
        $this->comp = Competition::where('uuid', $this->uuid)->first();
        $this->user = auth()->user();

        $this->name = $this->user['name'];
        $this->address = $this->user['locations'];

        session()->put('competition.id', $this->comp['id']);

        if(! in_array(auth()->user()->role_id, [2, 3])) {
            return redirect('studio/register?com=true');
        }

        if(PhotoCompetition::where('user_id', auth()->user()->id)->first()) {
            return redirect('/event');
        }

    }

    public function updatedFiles()
    {
        $filename = $this->comp['id'] . '-' . $this->user['id'] . '-' . $this->comp['title'] . '-' . rand(0, 9999);
        $this->files->storeAs('events/competitions', $filename . '.' . $this->files->getClientOriginalExtension());
    }

    public function sendFile()
    {
        // dd($this->files);
    }

    public function back()
    {
        return redirect('event/competition');
    }

    public function render()
    {
        if(empty($this->comp)) {
            abort(404);
        }
        return view('livewire.events.pages.competition-submit', [
            'comp' => $this->comp,
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Product;
use App\Events\UploadEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PhotoCompetition;
use App\Http\Traits\UploadPictures;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    use UploadPictures;

    public $uuid;
    public $directory;
    public $product;

    public function setImages(Request $request) {
        $this->uuid = session()->get('uuid');
        $this->directory = 'users/' . auth()->user()->id . '/products/' . $this->uuid . '/';
        $this->product = Product::where('uuid', $this->uuid)->first();

        $file = $request->file('files');
        // return $request->all();
        // return $file->getClientOriginalname();
        $this->updatePictures($file);

        broadcast(new UploadEvent(auth()->user()));
    }

    public function setFileCompetition(Request $request)
    {
        $file = $request->file('files');
        $filename = rand(0, 9999) . '-' . $file->getClientOriginalName();
        Storage::disk('local')->putFileAs('events/competitions', $file, $filename);
        $idFile = File::create([
            'user_id' => auth()->user()->id,
            'path' => Storage::disk('local')->url('events/competitions/' . $filename),
            'new_name' => $filename,
            'old_name' => $file->getClientOriginalName(),
            'size' => $file->getSize(),
            'type' => $file->getClientOriginalExtension(),
        ]);
        return $idFile->id;
    }

    public function delFileCompetition(Request $request)
    {
        // return $request->files;
        // $file = File::where('id', $request->files)->first();
        // Storage::disk('local')->delete($file->path);
        // File::where('id', $request->files)->delete();
    }

    public function submitCompetition(Request $request)
    {
        $this->validate($request,[
           'title' => 'required',
           'description' => 'required',
        ], [
            'title.required' => 'Judul karya tidak boleh kosong',
            'description.required' => 'Deskripsi karya tidak boleh kosong',
        ]);
        PhotoCompetition::create([
            'uuid' => Str::uuid(),
            'competition_id' => (int) session()->get('competition.id'),
            'user_id' => auth()->user()->id,
            'title' => $request->title,
            'description' => $request->description,
            'file_id' => $request->get('files') ?? 0,
            'url' => $request->url,
        ]);
        return redirect(url('event/competition'))->with(['status' => 'File berhasil dikirim', 'messages' => 'Untuk pengumuman lebih lanjut silakan pantau terus Instagram @exova.id']);
    }
}

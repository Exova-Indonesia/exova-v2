<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Events\UploadEvent;
use Illuminate\Http\Request;
use App\Http\Traits\UploadPictures;

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
}

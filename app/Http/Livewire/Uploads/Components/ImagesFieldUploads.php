<?php

namespace App\Http\Livewire\Uploads\Components;

use Image;
use App\Models\File;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\ProductImageDimension;
use Illuminate\Support\Facades\Storage;

class ImagesFieldUploads extends Component
{
    use WithFileUploads;
    
    public $picture = [];
    public $pictures = [];
    public $urlyoutube;
    public $directory;
    public $dimensions = [250, 480, 720];
    public $fileDimensionId = [];
    public $uuid;
    public $product;
    public $file_path;
    

    public function mount()
    {
        $this->uuid = session()->get('products.uuid');
        $this->directory = 'users/' . auth()->user()->id . '/products/' . $this->uuid . '/';
        $this->product = Product::with('images.getSmall')->where('uuid', $this->uuid)->first();
    }

    private function resizeImage($img)
    {
        $s3 = Storage::disk('s3');
        try {
            $extension = $img->getClientOriginalExtension();
            $filename = time() . '-' . $this->product['id'];
            foreach ($this->dimensions as $key => $value) {
                $resize = Image::make($img)->resize($value, null, function ($constraint) {
                $constraint->aspectRatio();
                })->encode($extension);
                $this->file_path = $this->directory . $value . '/' . $filename;
                $s3->put($this->file_path, (string)$resize, 'public');
                $this->storeDbImage($img, $filename, $extension, $s3->size($this->file_path), $s3->url($this->file_path));
            }
                $this->storeDbResizedImage($this->fileDimensionId);
                // $s3->putFileAs($this->directory . 'original' . '/', $img, $filename);
                // $this->storeDbImage($img, $filename, $extension, $s3->size($this->directory . 'original' . '/' . $filename), $s3->url($this->directory . 'original' . '/' . $filename));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    private function storeDbImage($img, $filename, $extension, $size, $path)
    {
        try {
            $data = File::create([
                "user_id" => auth()->user()->id,
                'path' => $path,
                "new_name" => $filename,
                "old_name" => $img->getClientOriginalName(),
                "size" => $size,
                "type" => $extension,
            ]);
            $this->fileDimensionId[] = $data->id;
            // array_push($data->id, $this->fileDimensionId);
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    private function storeDbResizedImage($data)
    {
        $dimens = new ProductImageDimension;
        try {
            $dimens->updateOrCreate([
                "product_id" => $this->product['id'],
                "small" => $data[0],
                "medium" => $data[1],
                "large" => $data[2],
                "original" => $data[2],
            ]);
            foreach ($data as $key => $value) {
                unset($this->fileDimensionId[$key]);
            }
            $this->fileDimensionId = [];
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function updatedPictures()
    {
        try {
            foreach ($this->pictures as $key => $value) {
                    (! isset($this->picture[0]) || empty($this->product['cover_id']))
                    ? $this->picture[$key] = $value
                    : $this->picture[] = $value;
                    dd($this->picture);
                    // $this->resizeImage($value);
                // $value->store('photos', 's3');
            }

            $cover = ProductImageDimension::where('product_id', $this->product['id'])->first();
            Product::updateOrCreate([
                "uuid" => $this->uuid,
                "seller_id" => auth()->user()->id,
            ],[
                "cover_id" => $cover->id,
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deletePictures($index)
    {
        try {
            $str = explode('-', $index);
            unset($this->picture[$str[0]]);
            array_values(array_filter($this->picture));
            $dimens = ProductImageDimension::where('id', $str[1]);
            $idFiles = $dimens->first();

            foreach ([$idFiles->small,
            $idFiles->medium,
            $idFiles->large,
            $idFiles->original] as $key => $value) {
                $files = File::where('id', $value);
                $path = $files->first();
                Storage::disk('s3')->delete($path['path']);

                $files->delete();
                $dimens->delete();
                $this->product = Product::with('images.getSmall')->where('uuid', $this->uuid)->first();
            }
            $cover = ProductImageDimension::where('product_id', $this->product['id'])->first();
            Product::updateOrCreate([
                "uuid" => $this->uuid,
                "seller_id" => auth()->user()->id,
            ],[
                "cover_id" => $cover->id ?? null,
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }

    }
    public function render()
    {
        return view('livewire.uploads.components.images-field-uploads');
    }
}

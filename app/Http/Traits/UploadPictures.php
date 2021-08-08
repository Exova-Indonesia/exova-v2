<?php 
namespace App\Http\Traits;

use Image;
use Throwable;
use App\Models\File;
use App\Models\Product;
use App\Models\ProductImageDimension;
use Illuminate\Support\Facades\Storage;
/**
 * 
 */
trait UploadPictures
{
    public $pictureId;
    public $urlyoutube;
    public $directory;
    public $dimensions = [250, 480, 720];
    public $fileDimensionId = [];
    public $uuid;
    public $product;
    public $file_path;
    public $index;
    

    public function mountUploadPictures()
    {
        $this->directory = 'users/' . auth()->user()->id . '/products/' . $this->uuid . '/';
        $this->product = Product::where('uuid', $this->uuid)->first();
    }

    private function resizeImage($img)
    {
        $s3 = Storage::disk('public');
        try {
            $extension = $img->getClientOriginalExtension();
            $filename = time() . '-' . $this->product['id'] . '.' . $extension;
            foreach ($this->dimensions as $key => $value) {
                $resize = Image::make($img)->resize($value, null, function ($constraint) {
                $constraint->aspectRatio();
                })->encode($extension);
                $this->file_path = $this->directory . $value . '/' . $filename;
                $s3->put($this->file_path, (string)$resize, 'public');
                $this->storeDbImage($img, $filename, $extension, $s3->size($this->file_path), $s3->url($this->file_path));
            }
                $s3->putFileAs($this->directory . 'original' . '/', $img, $filename);
                $this->storeDbImage($img, $filename, $extension, $s3->size($this->directory . 'original' . '/' . $filename), $s3->url($this->directory . 'original' . '/' . $filename));
                $this->storeDbResizedImage($this->fileDimensionId);
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
        try {
            $dimens = ProductImageDimension::create([
                "product_id" => $this->product['id'],
                "small" => $data[0],
                "medium" => $data[1],
                "large" => $data[2],
                "original" => $data[3],
            ]);
            $this->pictureId = $dimens->id;
            foreach ($data as $key => $value) {
                unset($this->fileDimensionId[$key]);
            }
            $this->fileDimensionId = [];
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    public function updatePictures($img, $type = null)
    {
        try {
            $this->resizeImage($img);
            $this->picture = $img;
            if($type == 'cover') {
                Product::updateOrCreate([
                    "uuid" => $this->uuid,
                    "seller_id" => auth()->user()->id,
                ],[
                    "cover_id" => $this->pictureId,
                ]);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function setCover($id)
    {
        Product::updateOrCreate([
            "uuid" => $this->uuid,
            "seller_id" => auth()->user()->id,
        ],[
            "cover_id" => $id,
        ]);
    }

    public function deletePictures($id)
    {
        try {
            $dimens = ProductImageDimension::where('id', $id);
            $idFiles = $dimens->first();

            foreach ([$idFiles->small,
            $idFiles->medium,
            $idFiles->large,
            $idFiles->original] as $key => $value) {
                $files = File::where('id', $value);
                $path = $files->first();
                Storage::disk('public')->delete($path['path']);

                $files->delete();
                $dimens->delete();
                $this->product = Product::with('images.getSmall')->where('uuid', $this->uuid)->first();
            }
            $cover = Product::where('id', $this->product['id'])->first();
            if($cover->cover_id == $id) {
                Product::updateOrCreate([
                    "uuid" => $this->uuid,
                    'id' => $this->product['id'],
                    "seller_id" => auth()->user()->id,
                ],[
                    "cover_id" => null,
                ]);
            }

        } catch (\Throwable $th) {
            throw $th;
        }

    }
}


?>
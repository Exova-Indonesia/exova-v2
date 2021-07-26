<?php 
namespace App\Http\Traits;

use Storage;
use App\Models\File;
use App\Models\Contract;
use Illuminate\Support\Str;
use App\Models\ContractFile;
use Illuminate\Support\Facades\Validator;
/**
 * 
 */
trait UploadFiles
{
    public function store()
    {
        try {
            $this->picture->storePubliclyAs($this->directory, $this->filesName, 's3');
            $this->storeToDb();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function storeFls()
    {
        try {
            $this->files->storePubliclyAs($this->directory, $this->filesName, 's3');
            $this->storeToDb();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function upPics()
    {
        $this->old_name = $this->picture->getClientOriginalName();
        $this->size = $this->picture->getSize();
        $this->ext = $this->picture->getClientOriginalExtension();
        // $validator = Validator::make(
        //     ['picture' => $this->picture],
        //     ['picture' => 'max:2048'],
        // );
        $this->filesName = uniqid();
        $this->store();
    }

    public function upFls()
    {
        $this->old_name = $this->files->getClientOriginalName();
        $this->size = $this->files->getSize();
        $this->ext = $this->files->getClientOriginalExtension();
        // $validator = Validator::make(
        //     ['files' => $this->files],
        //     ['files' => 'max:25600'],
        // );

        if($validator->fails()) {
            $this->flsRemove();
            $this->dispatchBrowserEvent('notification', 
            ['type' => 'error',
            'title' => $validator->errors()->first('files')]);
        } else {
            $this->filesName = uniqid() . '.' . $this->ext;
            $this->storeFls();
        }
    }

    public function storeToDb()
    {
        $path = Storage::disk('s3')->url($this->directory . '/' . $this->filesName);
        try {
            $this->idFiles = File::create([
                "user_id" => auth()->user()->id,
                'path' => $path,
                "new_name" => $this->filesName,
                "old_name" => $this->old_name,
                "size" => $this->size,
                "type" => $this->ext,
            ]);
            $this->isUpload = false;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function storeFilesContract()
    {
        $this->storeFls();
        ContractFile::create([
            'contract_id' => $this->data['id'],
            'file_id' => $this->idFiles['id'],
        ]);
        Contract::where('id', $this->data['id'])->update([
            'status' => Contract::IS_REQUESTED,
        ]);
        $this->emit('reloadContract');
        $this->dispatchBrowserEvent('pondReset');
        $this->dispatchBrowserEvent('notification', 
        ['type' => 'success',
        'title' => 'Berhasil menyimpan file']);
    }
}


?>
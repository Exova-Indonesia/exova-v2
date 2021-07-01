<?php 
namespace App\Http\Traits;

use Illuminate\Support\Str;
/**
 * 
 */
trait UploadFiles
{
    public $directory;
    public function store()
    {
        $this->directory = "messages/attachments";
        $this->photo->storePubliclyAs($this->directory, $this->filesName, 's3');
    }
}

?>
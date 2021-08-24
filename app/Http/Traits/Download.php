<?php 
namespace App\Http\Traits;

use Storage;
/**
 * 
 */
trait Download
{
    public function download($file)
    {
        $file = json_decode($file, true);
        $filename = 'exova-asset.' . $file['type'];
        $tempImage = tempnam(sys_get_temp_dir(), $filename);
        copy($file['path'], $tempImage);

        return response()->download($tempImage, $filename);
    }

    public function certificateDownload($file)
    {
        return Storage::disk('local')->download($file);
    }
}

?>
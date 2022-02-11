<?php


namespace App\Services;

use Exception;
use Illuminate\Http\UploadedFile;

class UploadService 
{
    public function saveFile(UploadedFile $file):string {
        $status =  $file->storeAs('news', $file->hashName(), 'public');
        if(!$status) {  
            throw new Exception("File was't upload!");
        } 
        return $status;
    }
}
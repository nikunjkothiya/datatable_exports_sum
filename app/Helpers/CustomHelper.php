<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


function commonUploadImage($storage_path, $file_path)
{
    $storage_path = 'public/' . $storage_path;
    $file_store_path = Storage::disk('local')->put($storage_path, $file_path);
    return $file_store_path;
}

function deleteOldImage($file_path)
{
    if ($file_path != "product_image/no-image.jpg") {
        $file_delete = Storage::disk('local')->delete($file_path);
    }
    return true;
}

function getUploadImage($storage_path)
{
    return Storage::url($storage_path);
}

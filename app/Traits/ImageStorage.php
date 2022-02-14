<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageStorage
{
    /**
     * @param mixed $photo
     * @param mixed $name
     * @param mixed $path
     * @param bool $update
     * @param null $old_photo
     *
     * @return [type]
     */
    public function uploadImage($photo, $name, $path, $update = false, $old_photo = null)
    {
        if ($update) {
            Storage::delete("/public/{$path}/". $old_photo);
        }

        $name =  Str::slug($name). "-" . time();
        $extension = $photo->getClientOriginalExtension();
        $newName = $name . '.' . $extension;
        Storage::putFileAs("/public/{$path}", $photo, $newName);
        return $newName;
    }

    public function deleteImage($old_photo, $path)
    {
        Storage::delete("/public/{$path}", $old_photo);
    }
}
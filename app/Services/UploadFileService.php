<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class UploadFileService
{
    public static function storeFileStorage(int $id, array $files = []): array
    {
        $data = [];
        $success = true;
    
        foreach ($files as $file) {
            $directory = 'attachments/' . $id . '/files';
            $filename = $file->hashName();

            if (!Storage::disk('public')->exists($directory)) {
                Storage::disk('public')->makeDirectory($directory);
            }

            $directory = 'public/' . $directory;
            $path = $file->storeAs($directory, $filename);
    
            if ($path) {
                $data[] = str_replace('public/', '', $path);
            } else {
                $success = false;
            }
        }
    
        $response = ['data' => $data, 'success' => $success];
        return $response;
    }
}

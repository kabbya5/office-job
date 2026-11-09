<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

trait FileUploadTrait
{
    public function uploadFile(
        UploadedFile $file,
        string $folder = 'uploads',
        ?int $width = null,
        ?int $height = null,
        int $quality = 90
    ): string {

        $extension = $file->getClientOriginalExtension();
        $filename = Str::uuid() . '.' . $extension;

        $path = public_path($folder);

        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }

        // Check if file is image
        if (str_starts_with($file->getMimeType(), 'image/')) {

            $manager = new ImageManager(new Driver());

            $image = $manager->decode($file);

            // Resize only if width or height provided
            if ($width || $height) {
                $image->scale(
                    width: $width,
                    height: $height
                );
            }

            $image->save(
                $path . '/' . $filename,
                quality: $quality
            );

        } else {

            // Non-image files
            $file->move($path, $filename);
        }

        return $folder . '/' . $filename;
    }
}
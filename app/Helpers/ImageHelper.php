<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;

class ImageHelper
{
    public static function uploadImage(?UploadedFile $uploadedFile, $oldImagePath, $directory)
    {
        // If the uploaded file is null, return null
        if ($uploadedFile === null) {
            return null;
        }

        // Delete the old image if it exists
        if (!empty($oldImagePath)) {
            $oldImageFullPath = public_path($oldImagePath);
            if (file_exists($oldImageFullPath)) {
                unlink($oldImageFullPath);
            }
        }

        // Get the original name and extension of the uploaded file
        $originalName = $uploadedFile->getClientOriginalName();
        $filename = pathinfo($originalName, PATHINFO_FILENAME);
        $extension = $uploadedFile->getClientOriginalExtension();
        $path = "{$directory}/{$originalName}";
        $fullPath = public_path($path);

        // Check if the file already exists and append a number if it does
        $counter = 1;
        while (file_exists($fullPath)) {
            $path = "{$directory}/{$filename}_{$counter}.{$extension}";
            $fullPath = public_path($path);
            $counter++;
        }

        // Ensure the directory exists
        if (!file_exists(public_path($directory))) {
            mkdir(public_path($directory), 0777, true);
        }

        // Move the uploaded file to the determined path
        $uploadedFile->move(public_path($directory), basename($fullPath));

        return $path;
    }

    public static function uploadNewImage(?UploadedFile $uploadedFile, $directory)
    {
        // If the uploaded file is null, return null
        if ($uploadedFile === null) {
            return null;
        }

        // Get the original name and extension of the uploaded file
        $originalName = $uploadedFile->getClientOriginalName();
        $filename = pathinfo($originalName, PATHINFO_FILENAME);
        $extension = $uploadedFile->getClientOriginalExtension();
        $path = "{$directory}/{$originalName}";
        $fullPath = public_path($path);

        // Check if the file already exists and append a number if it does
        $counter = 1;
        while (file_exists($fullPath)) {
            $path = "{$directory}/{$filename}_{$counter}.{$extension}";
            $fullPath = public_path($path);
            $counter++;
        }

        // Ensure the directory exists
        if (!file_exists(public_path($directory))) {
            mkdir(public_path($directory), 0777, true);
        }

        // Move the uploaded file to the determined path
        $uploadedFile->move(public_path($directory), basename($fullPath));

        return $path;
    }

    public static function deleteImage($imagePath)
    {
        // If the uploaded file is null, return null
        if ($imagePath === null) {
            return null;
        }
        // Get the full path of the image in the public folder
        $fullPath = public_path($imagePath);

        // Check if the file exists and delete it
        if (file_exists($fullPath)) {
            unlink($fullPath);
        }
    }

    public static function uploadNewImages(array $uploadedFiles, $directory)
    {
        // If the uploaded file is null, return null
        if (empty($uploadedFiles)) {
            return null;
        }
        $paths = [];

        foreach ($uploadedFiles as $uploadedFile) {
            // Ensure the file is an instance of UploadedFile
            if ($uploadedFile instanceof UploadedFile) {
                // Get the original name and extension of the uploaded file
                $originalName = $uploadedFile->getClientOriginalName();
                $filename = pathinfo($originalName, PATHINFO_FILENAME);
                $extension = $uploadedFile->getClientOriginalExtension();
                $path = "{$directory}/{$originalName}";
                $fullPath = public_path($path);

                // Check if the file already exists and append a number if it does
                $counter = 1;
                while (file_exists($fullPath)) {
                    $path = "{$directory}/{$filename}_{$counter}.{$extension}";
                    $fullPath = public_path($path);
                    $counter++;
                }

                // Ensure the directory exists
                if (!file_exists(public_path($directory))) {
                    mkdir(public_path($directory), 0777, true);
                }

                // Move the uploaded file to the determined path
                $uploadedFile->move(public_path($directory), basename($fullPath));

                // Store the path in the array
                $paths[] = $path;
            }
        }

        return $paths;
    }

    public static function updateImages(array $newUploadedFiles, ?array $oldImagePaths, $directory)
    {
        // If the uploaded file is null, return null
        if (empty($newUploadedFiles)) {
            return null;
        }
        $newPaths = [];

        // Delete old images
        if (!empty($oldImagePaths)) {
            foreach ($oldImagePaths as $oldImagePath) {
                if (!empty($oldImagePath)) {
                    $fullPath = public_path($oldImagePath);
                    if (file_exists($fullPath)) {
                        unlink($fullPath);
                    }
                }
            }
        }

        // Upload new images
        foreach ($newUploadedFiles as $uploadedFile) {
            // Ensure the file is an instance of UploadedFile
            if ($uploadedFile instanceof UploadedFile) {
                // Get the original name and extension of the uploaded file
                $originalName = $uploadedFile->getClientOriginalName();
                $filename = pathinfo($originalName, PATHINFO_FILENAME);
                $extension = $uploadedFile->getClientOriginalExtension();
                $path = "{$directory}/{$originalName}";
                $fullPath = public_path($path);

                // Check if the file already exists and append a number if it does
                $counter = 1;
                while (file_exists($fullPath)) {
                    $path = "{$directory}/{$filename}_{$counter}.{$extension}";
                    $fullPath = public_path($path);
                    $counter++;
                }

                // Ensure the directory exists
                if (!file_exists(public_path($directory))) {
                    mkdir(public_path($directory), 0777, true);
                }

                // Move the uploaded file to the determined path
                $uploadedFile->move(public_path($directory), basename($fullPath));

                // Store the path in the array
                $newPaths[] = $path;
            }
        }

        return $newPaths;
    }

    public static function deleteImages(array $imagePaths)
    {
        foreach ($imagePaths as $imagePath) {
            if (!empty($imagePath)) {
                $fullPath = public_path($imagePath);
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }
        }
    }
}

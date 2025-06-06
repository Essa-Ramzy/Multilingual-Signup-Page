<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UploadService
{
  /**
   * Upload an image file
   *
   * @param UploadedFile $file The uploaded file
   * @return array Response with success status, filename, and any errors
   */
  public function uploadImage(UploadedFile $file)
  {
    // Initialize errors array
    $errors = [];

    // Check if file is actually an image
    if (!$file->isValid()) {
      $errors[] = "Upload error occurred.";
      return ["success" => false, "errors" => $errors];
    }

    // Get file information
    $extension = $file->getClientOriginalExtension();
    $fileSize = $file->getSize();

    // Validate file extension
    if (!in_array(strtolower($extension), config('upload.allowed_extensions'))) {
      $errors[] = "Only JPG, JPEG, and PNG files are allowed.";
    }

    // Validate file size
    if ($fileSize > config('upload.max_size')) {
      $errors[] = "File is too large. Maximum size is 5MB.";
    }

    // If no errors, upload the file
    if (empty($errors)) {
      // Generate unique filename
      $uniqueFileName = Str::uuid() . '.' . $extension;

      // Store the file
      $path = $file->storeAs(
        config('upload.directory'),
        $uniqueFileName,
        'public'
      );

      return [
        "success" => true,
        "filename" => $uniqueFileName,
        "path" => $path
      ];
    } else {
      return ["success" => false, "errors" => $errors];
    }
  }

  /**
   * Upload a base64 encoded image
   *
   * @param string $base64Data The base64 encoded image data
   * @return array Response with success status, filename, and any errors
   */
  public function uploadBase64Image($base64Data)
  {
    // Initialize errors array
    $errors = [];

    // Check if the data is a valid base64 string
    if (strpos($base64Data, 'data:image/') !== 0) {
      $errors[] = "Invalid image data.";
      return ["success" => false, "errors" => $errors];
    }

    // Extract the image type and data
    list($type, $data) = explode(';', $base64Data);
    list(, $data) = explode(',', $data);
    list(, $type) = explode(':', $type);
    list(, $extension) = explode('/', $type);

    // Validate file extension
    if (!in_array(strtolower($extension), config('upload.allowed_extensions'))) {
      $errors[] = "Only JPG, JPEG, and PNG files are allowed.";
    }

    // Decode the base64 data
    $decodedData = base64_decode($data);

    // Calculate the file size in bytes
    $fileSize = strlen($decodedData);

    // Validate file size
    if ($fileSize > config('upload.max_size')) {
      $errors[] = "File is too large. Maximum size is 5MB.";
    }

    // If no errors, upload the file
    if (empty($errors)) {
      // Generate unique filename
      $uniqueFileName = Str::uuid() . '.' . $extension;

      // Store the file
      $path = config('upload.directory') . '/' . $uniqueFileName;
      Storage::disk('public')->put($path, $decodedData);

      return [
        "success" => true,
        "filename" => $uniqueFileName,
        "path" => $path
      ];
    } else {
      return ["success" => false, "errors" => $errors];
    }
  }
}
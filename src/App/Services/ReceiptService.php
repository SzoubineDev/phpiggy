<?php

declare(strict_types=1);

namespace App\Services;

use App\Config\Paths;
use Framework\Database;
use Framework\Exceptions\ValidationException;

class ReceiptService
{
    public function __construct(private Database $db) {}
    public function validateFile(?array $file)
    {
        if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
            throw new ValidationException([
                'receipt' => ["Faild to upload file!"]
            ]);
        }
        $maxFileSizeMb = 3;
        if ($file['size'] > ($maxFileSizeMb * 1024 * 1024)) {
            throw new ValidationException([
                'receipt' => ["File size is large, File should be less then  {$maxFileSizeMb} MB"]
            ]);
        }
        $originalFileName = $file['name'];
        if (!preg_match('/^[A-Za-z0-9\s.-_]+$/', $originalFileName)) {
            throw new ValidationException([
                'receipt' => ['invalid filename']
            ]);
        }
        $clientMimeType = $file['type'];
        $allowedMimeTypes = ['image/png', 'image/jpeg', 'application/pdf'];
        if (!in_array($clientMimeType, $allowedMimeTypes)) {
            throw new ValidationException([
                'receipt' => ['invalid file type']
            ]);
        }
    }
    public function upload(array $file, int $transaction_id)
    {
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newFileName = bin2hex(random_bytes(16)) . "." . $fileExtension;
        $uploadPath = Paths::STORAGE_UPLOADS . '/' . $newFileName;
        if (!move_uploaded_file($file['tmp_name'], $uploadPath)) {
            throw new ValidationException(['receipt' => ['Failed to uplaod file!']]);
        }
        $this->db->query("INSERT INTO receipts (transaction_id,original_filename,storage_filename,media_type)
        VALUES (:transaction_id,:original_filename,:storage_filename,:media_type)", [
            'transaction_id' => $transaction_id,
            'original_filename' => $file['name'],
            'storage_filename' => $uploadPath,
            'media_type' => $file['type']
        ]);
    }
}

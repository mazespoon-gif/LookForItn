<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class StorageController extends Controller
{
    public function show(string $file)
    {
        // Log for debugging
        \Log::info("StorageController accessed with file: " . $file);
        
        $projectRef = 'uchrsyhiaafsioyhvypx';
        $bucket = 'lookforit';
        
        // Check if file parameter already has posts/ prefix
        $path = str_starts_with($file, 'posts/') ? $file : 'posts/' . $file;
        
        $publicUrl = "https://{$projectRef}.supabase.co/storage/v1/object/public/{$bucket}/{$path}";
        
        // Debug log
        \Log::info("Fetching from URL: " . $publicUrl);
        
        // Fetch image directly from Supabase
        $client = new \GuzzleHttp\Client();
        try {
            $response = $client->get($publicUrl);
            $contents = $response->getBody()->getContents();
        } catch (\Exception $e) {
            \Log::error("Failed to fetch image: " . $e->getMessage());
            abort(404);
        }
        
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $mimeType = match(strtolower($extension)) {
            'jpg', 'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
            'webp' => 'image/webp',
            default => 'application/octet-stream',
        };
        
        return response($contents, 200, [
            'Content-Type' => $mimeType,
            'Content-Length' => strlen($contents),
            'Cache-Control' => 'public, max-age=31536000',
        ]);
    }
}

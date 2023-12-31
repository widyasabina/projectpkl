<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function showPDF($filename)
    {
        $path = storage_path($filename);

        // Check if the file exists
        if (file_exists($path)) {
            $file = file_get_contents($path);

            // Return the file as a response with the "application/pdf" content type
            return Response::make($file, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="' . $filename . '"',
            ]);
        }

        // Handle the case where the file does not exist
        abort(404);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DrownloadPolitics extends Controller
{
    public function drownloadArchive()
    {
        $archivePath = storage_path('');
        $nombreArchivo = '';

        return response()->download($archivePath, $nombreArchivo);
    }
}

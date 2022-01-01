<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class FormController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Halaman Create Data',
        ], 200);
    }
}
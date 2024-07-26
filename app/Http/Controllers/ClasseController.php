<?php

namespace App\Http\Controllers;

use App\Models\Classe;

class ClasseController extends Controller
{
    public function index()
    {
        $classes = Classe::all();
        return response()->json($classes);
    }
}
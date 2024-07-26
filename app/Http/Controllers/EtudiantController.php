<?php
namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::with('classe')->get();
        return response()->json($etudiants);
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:etudiants',
            'prenom' => 'required',
            'datenaissance' => 'required|date',
            'adresse' => 'required',
            'classe_id' => 'required|exists:classes,id',
        ]);

        $etudiant = Etudiant::create($request->all());
        return response()->json($etudiant, 201);
    }

    public function getByClasse($classeId)
    {
        $etudiants = Etudiant::where('classe_id', $classeId)->get();
        return response()->json($etudiants);
    }
}
<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Etudiant;
 
class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $etudiants = auth()->user()->etudiants;
  
        return view('etudiants.index', compact('etudiants'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('etudiants.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge(['user_id' => auth()->user()->id]);

    // Créez l'étudiant avec les données du formulaire
    Etudiant::create($request->all());

    return redirect()->route('etudiants.index')->with('success', 'Etudiant added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $etudiant = Etudiant::findOrFail($id);
  
        return view('etudiants.show', compact('etudiant'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $etudiant = Etudiant::findOrFail($id);
  
        return view('etudiants.edit', compact('etudiant'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $etudiant = Etudiant::findOrFail($id);
  
        $etudiant->update($request->all());
  
        return redirect()->route('etudiants')->with('success', 'etudiant updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $etudiant = Etudiant::findOrFail($id);
  
        $etudiant->delete();
  
        return redirect()->route('etudiants')->with('success', 'etudiant deleted successfully');
    }
}
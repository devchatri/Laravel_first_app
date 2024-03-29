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
    $user = auth()->user();

    if ($user->role == "admin") {
        // If the user is an admin, fetch only their associated students
        $etudiants = $user->etudiants;
    } else {
        // If the user is not an admin, check if they have a student record
        $etudiant = Etudiant::where('user_id', $user->id)->first();

        if (!$etudiant) {
            // If the user doesn't have a student record, create one with default values
            $defaultAttributes = [
                'nom' => 'Default',
                'prenom' => 'Student',
                'sexe' => 'Male', // You can change this to the default value you want
                'filiere_id' => 1, // Change this to the default filiere_id
                'user_id' => $user->id,
            ];

            $etudiant = Etudiant::create($defaultAttributes);
        }

        $etudiants = collect([$etudiant]); // Convert the array to a collection
    }

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
<?php

namespace App\Http\Controllers;

use App\Models\Placement;
use App\Models\Code;
use App\Models\Student;
use App\Models\Surveillance;
use App\Http\Requests\StorePlacementRequest;
use App\Http\Requests\UpdatePlacementRequest;
use Illuminate\Http\Request;
use App\Models\Promotion;



class PlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("placements.index")->with([
            "placements"=>Placement::all(),
            "students"=>Student::all(),
            "surveillances"=>Surveillance::all(),
            "codes"=>Code::all(),
            "promotions"=>Promotion::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlacementRequest $request)
    {
        //
        $data = $request->validated();
        $code = Code::find($data["code_id"]);
        $data["surveillance_id"]= $code->surveillance_id;
        $placement = Placement::create($data);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Placement $placement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Placement $placement)
    {
        //
        return view("placements.edit")->with(["placement"=>$placement]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlacementRequest $request, Placement $placement)
    {
        //
        $data = $request->validated();
        $code = Code::find($data["code_id"]);
        $data["surveillance_id"]= $code->surveillance_id;
        $placement->update($data);
        return redirect()->route("placement.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Placement $placement)
    {
        //
        $placement->delete();
        return redirect()->back();
    }


    /**
 * Génère automatiquement des codes pour une surveillance donnée
 */
private function generateCodes($surveillanceId, $count, $prefix = "CODE")
{
    $existingCodesCount = Code::where('surveillance_id', $surveillanceId)->count();
    $codesToGenerate = max(0, $count - $existingCodesCount);

    if ($codesToGenerate > 0) {
        $newCodes = [];
        $startFrom = $existingCodesCount + 1;

        for ($i = 0; $i < $codesToGenerate; $i++) {
            $codeValue = $prefix . str_pad($startFrom + $i, 4, '0', STR_PAD_LEFT);
            $newCodes[] = [
                'value' => $codeValue,
                'surveillance_id' => $surveillanceId,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        Code::insert($newCodes);
    }

    return Code::where('surveillance_id', $surveillanceId)
              ->orderBy('id')
              ->get();
}

    /**
 * Crée automatiquement des placements pour tous les étudiants d'une promotion pour une surveillance donnée
 */
/**
 * Crée automatiquement des placements pour tous les étudiants d'une promotion pour une surveillance donnée
 * et génère automatiquement les codes si nécessaire
 */
public function autoPlace(Request $request)
{
    $request->validate([
        'promotion_id' => 'required|exists:promotions,id',
        'surveillance_id' => 'required|exists:surveillances,id',
        'code_prefix' => 'nullable|string|max:10'
    ]);

    $promotionId = $request->promotion_id;
    $surveillanceId = $request->surveillance_id;
    $codePrefix = $request->code_prefix ?? 'CODE';

    // Récupérer tous les étudiants de la promotion
    $students = Student::where('promotion_id', $promotionId)->get();
    $studentsCount = $students->count();

    if ($studentsCount === 0) {
        return redirect()->back()->with('error', 'Aucun étudiant trouvé dans cette promotion');
    }

    // Générer ou récupérer les codes nécessaires
    $codes = $this->generateCodes($surveillanceId, $studentsCount, $codePrefix);

    // Créer les placements
    $createdCount = 0;
    foreach ($students as $index => $student) {
        // Vérifier si l'étudiant n'a pas déjà un placement pour cette surveillance
        $existingPlacement = Placement::where('student_id', $student->id)
                                    ->where('surveillance_id', $surveillanceId)
                                    ->first();

        if (!$existingPlacement && isset($codes[$index])) {
            Placement::create([
                'student_id' => $student->id,
                'code_id' => $codes[$index]->id,
                'surveillance_id' => $surveillanceId
            ]);
            $createdCount++;
        }
    }

    $message = $createdCount . ' placements créés avec succès.';
    if ($createdCount < $studentsCount) {
        $message .= ' Certains étudiants avaient déjà un placement pour cette surveillance.';
    }

    return redirect()->back()->with('success', $message);
}
}

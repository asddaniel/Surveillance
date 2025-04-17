<?php

namespace App\Http\Controllers;

use App\Models\Surveillance;
use App\Http\Requests\StoreSurveillanceRequest;
use App\Http\Requests\UpdateSurveillanceRequest;
use Gemini\Laravel\Facades\Gemini;
use Gemini\Data\Blob;
use Gemini\Enums\MimeType;
use App\Http\Requests\ResolveSurveilRequest;
use Illuminate\Support\Facades\Log;


class SurveillanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view("surveillances.index")->with(["surveillances"=>Surveillance::all()]);
    }


    public function resolve( Surveillance $surveillance)
    {
        //
        return view("surveilresolution")->with(["surveillance"=> $surveillance]);
    }
    public function solveSurveillance(ResolveSurveilRequest $request, Surveillance $surveillance)
    {
        try {
            // Préparer les données des placements
            $placements = $surveillance->placements;
            $studentsList = $placements->map(function($placement) {
                return [
                    'name' => $placement->student->name,
                    'code' => $placement->code->value,
                    'seat_position' => $placement->seat_position // ajout de la position si disponible
                ];
            })->toJson();

            // Valider et traiter la vidéo
            $video = $request->file("video");
            if (!$video->isValid()) {
                throw new \Exception("Le fichier vidéo n'est pas valide");
            }

            // Construire le prompt détaillé
            $prompt = <<<PROMPT
            Vous êtes un expert en détection de triche pendant les examens.
            Analysez cette vidéo de surveillance pour identifier:

            1. Tous les étudiants qui trichent ou ont un comportement suspect
            2. Les codes des emplacements où la triche est détectée
            3. La nature de la triche (échange de documents, utilisation de téléphone, etc.)

            Voici la liste des étudiants avec leurs codes d'emplacement:
            $studentsList

            Rendez votre réponse sous forme de:
            - Liste détaillée des tricheurs
            - Preuves visuelles détectées
            - Niveau de certitude pour chaque cas
            - Suggestions d'actions à prendre
            PROMPT;

            // Envoyer la requête à Gemini
            $response = Gemini::geminiFlash()
                ->generateContent([
                    $prompt,
                    new Blob(
                        mimeType: MimeType::VIDEO_MP4,
                        data: base64_encode(file_get_contents($video->getRealPath()))
                    )
                ]);

            // Traiter la réponse
            $analysisResult = $response->text();

            // Optionnel: Sauvegarder le résultat
            // $surveillance->update([
            //     'analysis_result' => $analysisResult,
            //     'analyzed_at' => now()
            // ]);

            return response()->json([
                'success' => true,
                'analysis' => $analysisResult,
                'students_list' => json_decode($studentsList)
            ]);

        } catch (\Exception $e) {
            Log::error("Erreur d'analyse Gemini: " . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => "Échec de l'analyse: " . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSurveillanceRequest $request)
    {
        //
        Surveillance::create($request->validated());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Surveillance $surveillance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surveillance $surveillance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurveillanceRequest $request, Surveillance $surveillance)
    {
        //
        $surveillance->update($request->validated());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surveillance $surveillance)
    {
        //
        $surveillance->delete();
        return redirect()->back();
    }
}

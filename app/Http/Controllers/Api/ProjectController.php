<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //with("type", "technologies") = recupero i dati relativi a type e technologies
        //paginate(12) = avrò una paginazione di 12 risultati per pagina
        $projects = Project::with(["type", "technologies"])->paginate(3);
        //Risposta JSON contenente come dati $projects
        return response()->json($projects);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $project = Project::where("slug", $slug)->with(["type", "technologies"])->first();
        //se project non è definito mando un 404 in modo da poter fare poi il catch dell'errore
        if (!$project) {
            abort(404);
        }
        return response()->json($project);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

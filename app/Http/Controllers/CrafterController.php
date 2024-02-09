<?php

namespace App\Http\Controllers;

use App\Models\Crafter;
use Illuminate\Http\Request;

class CrafterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Crafter $crafters)
    {
       return $crafters->all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $crafter=Crafter::create([
            //getKey permet de recuperer l'id peut importe le nom qu'elle a dans la table ciblée remplace user()->id
            "user_id"=>$request->user()->getKey(),
            "information"=>$request->get('information'),
            "story"=>$request->get('story'),
            "crafting_process"=>$request->get('crafting_process'),
            "location"=>$request->get('location'),
            "material_preference"=>$request->get('material_preference'),
        ]);
        return $crafter;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return Crafter::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Crafter $crafter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crafter $crafter)
    {
        $crafter->delete();
    }
}

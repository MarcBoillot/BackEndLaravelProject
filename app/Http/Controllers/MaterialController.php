<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Material::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $material=Material::create([
            "material_name"=>$request->get('material_name'),
        ]);
        return $material;
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return $material;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validated();
        if ($material) {
            $material->update($validated);
        }
        return $material;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $material=Material::all()->find($id);
        $material->products()->detach();

        return $material->delete($material);
    }
}

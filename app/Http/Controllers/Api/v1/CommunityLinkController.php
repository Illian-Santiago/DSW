<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use App\Queries\CommunityLinkQuery;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = new CommunityLinkQuery();

        switch (true) {
            case request()->exists('text'):
                $links = $query->buscarPorNombre(request()->get('text'));
                break;

            case request()->exists('popular'):
                $links = $query->getMostPopular();
                break;

            default:
                $links = $query->getAll();
                break;
        }

        return response()->json($links);
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        // Implementar lógica para almacenar un nuevo enlace
    }
    /**
     * Update the specified resource in storage.
     */
    public function update($id)
    {
        // Implementar lógica para actualizar un enlace
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Implementar lógica para eliminar un enlace
    }
}

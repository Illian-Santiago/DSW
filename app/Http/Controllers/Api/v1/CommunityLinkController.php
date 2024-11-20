<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Models\CommunityLink;
use App\Queries\CommunityLinkQuery;
use App\Http\Requests\CommunityLinkForm;
use Illuminate\Support\Facades\Auth;

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

        // Si no se encuentra nada, retornar un JSON con mensaje de error
        if (!$links) {
            return response()->json("Not found", 404);
        }

        return response()->json($links);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Buscar el enlace por id
        $link = CommunityLink::find($id);

        // Si no se encuentra el enlace, retornar un JSON con mensaje de error
        if (!$link) {
            return response()->json("Link no encontrado", 404);
        }

        // Retornar el enlace encontrado
        return response()->json($link, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityLinkForm $request)
    {

        dd($request);
        if (!Auth::user()->trusted) {
            return back()->with('info', 'Your link is under review for approval.');
        }

        $data = $request->validated();
        $link = new CommunityLink($data);

        $existing = $link->hasAlreadyBeenSubmitted();

        if (!$existing) {
            $link->user_id = Auth::id();
            $link->approved = Auth::user()->trusted ?? false;
            $link->save();

            $response = [
                'status' => 'success',
                'message' => 'Link created',
                'data' => $link,
            ];
        } else {
            $response = [
                'status' => 'success',
                'message' => 'Link already submitted',
                'data' => $link,
            ];
        }
        return response()->json($response, 200);
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

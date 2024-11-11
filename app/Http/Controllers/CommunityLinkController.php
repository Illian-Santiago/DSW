<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\CommunityLink;
use Illuminate\Http\Request;
use App\Models\Channel;
use App\Http\Requests\CommunityLinkForm;
use App\Queries\CommunityLinkQuery;

class CommunityLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Channel $channel = null)
    {
        $channels = Channel::orderBy('title', 'asc')->get();
        $query = new CommunityLinkQuery();

        switch (true) {
            case request()->exists('inputField'):
                $links = $query->buscarPorNombre(request()->get('inputField'));
                break;

            case request()->exists('popular'):
                $links = $query->getMostPopular();
                break;

            case $channel:
                $links = $query->getByChannel($channel);
                break;

            default:
                $links = $query->getAll();
                break;
        }

        return view('dashboard', compact('links', 'channels'));
    }


    public function myLinks()
    {
        $user = Auth::user();
        $links = $user->myLinks()->paginate(10);

        return view('myLinks', compact('links'));
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
    public function store(CommunityLinkForm $request)
    {
        $data = $request->validated();
        $link = new CommunityLink($data);

        $existing = $link->hasAlreadyBeenSubmitted();

        if (!$existing) {
            $link->user_id = Auth::id();
            $link->approved = Auth::user()->trusted ?? false;

            $link->save();

            if (!Auth::user()->trusted) {
                return back()->with('info', 'Your link is under review for approval.');
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommunityLink $communityLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommunityLink $communityLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommunityLink $communityLink)
    {
        //
    }
}

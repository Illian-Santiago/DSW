<?php

namespace App\Queries;

use App\Models\Channel;
use App\Models\CommunityLink;

class CommunityLinkQuery {
    public function getByChannel(Channel $channel) {
        //Filtrar los links por el canal
        $links = $channel->communityLinks()
        ->latest('updated_at')
        ->paginate(10);

        return $links;
    }
    
    public function getAll() {
        // Mostrar todos los links que esten aprovados
        $links = CommunityLink::where('approved', true)
        ->latest('updated_at')
        ->paginate(10);

        return $links;
    }

    public function getMostPopular() {
        //Muestra los links que han sido votados
        $links = CommunityLink::Where('approved', 1)
        ->withCount('users')
        ->orderby('users_count', 'desc')
        ->paginate(10);

        return $links;
    }
}
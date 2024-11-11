<?php

namespace App\Queries;

use App\Models\Channel;
use App\Models\CommunityLink;

class CommunityLinkQuery
{
    public function getAll()
    {
        // Mostrar todos los links que esten aprovados
        $links = CommunityLink::where('approved', 1)
            ->latest('updated_at')
            ->paginate(10);

        return $links;
    }

    public function getByChannel(Channel $channel)
    {
        // Filtrar los links por el canal
        $links = $channel->communityLinks()
            ->where('approved', true)
            ->latest('updated_at')
            ->paginate(10);

        return $links;
    }

    public function getMostPopular()
    {
        //Muestra los links que han sido votados
        $links = CommunityLink::Where('approved', 1)
            ->withCount('users')
            ->orderby('users_count', 'desc')
            ->paginate(10);

        return $links;
    }

    public function buscarPorNombre(string $input)
    {
        $links = CommunityLink::where('approved', 1) // De los links que estan aprovados
            ->whereAny(['title', 'link'], 'like', '%' . $input . '%') // Buscamos esque contenga el input del usuario
            ->latest('updated_at')
            ->paginate(10);

        return $links;
    }

    public function getMostPopularByChannel(Channel $channel)
    {
        $links = $channel->communityLinks()
            ->where('approved', true)
            ->withCount('users')
            ->orderBy('users_count', 'desc')
            ->paginate(10);
        return $links;
    }
}

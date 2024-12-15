<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Ads;

class AdsPolicy
{
    /**
     * Détermine si l'utilisateur peut modifier l'annonce.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ads   $ad
     * @return bool
     */
    public function update(User $user, Ads $ad)
    {
        // L'utilisateur peut modifier l'annonce s'il en est le propriétaire
        return $user->id === $ad->users_id;

    }
}

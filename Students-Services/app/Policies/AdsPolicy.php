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

        return $user->id === $ad->users_id;
    }

    /**
     * Détermine si l'utilisateur peut supprimer l'annonce.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Ads   $ad
     * @return bool
     */
    public function delete(User $user, Ads $ad)
    {
        return $user->id === $ad->users_id;
    }
}

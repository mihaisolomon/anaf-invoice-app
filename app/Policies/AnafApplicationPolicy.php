<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\User;
use App\Modules\Anaf\Models\AnafApplication;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnafApplicationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, AnafApplication $team): bool
    {
        return $user->belongsToTeam($team);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }


}

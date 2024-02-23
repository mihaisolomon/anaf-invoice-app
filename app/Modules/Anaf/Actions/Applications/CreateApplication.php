<?php

declare(strict_types=1);

namespace App\Modules\Anaf\Actions\Applications;

use App\Models\User;
use App\Modules\Anaf\Actions\Contracts\CreateApplications;
use App\Modules\Anaf\AnafApplication;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class CreateApplication implements CreateApplications
{
    public function create(User $user, array $input)
    {
        Gate::forUser($user)->authorize('create', AnafApplication::newAnafApplicationModel());

        Validator::make($input, [
            'clientId' => ['required', 'string', 'max:255'],
            'clientSecret' => ['required', 'string', 'max:255'],
        ])->validateWithBag('createAnafApplication');

        $anafApplication = $user->ownedAnafApplications()->create([
            'team_id' => $user->current_team_id,
            'client_id' => $input['clientId'],
            'client_secret' => $input['clientSecret'],
            'is_active' => 0,
            'redirect_uri' => '-'
        ]);

        $anafApplication->redirect_uri = route('anaf.application.authorize', ['id' => $anafApplication->id]);
        $anafApplication->save();

        return $anafApplication;
    }
}

<?php

declare(strict_types=1);

namespace App\Modules\Anaf\Actions\Applications;

use App\Modules\Anaf\Actions\Contracts\CreateApplications;
use Illuminate\Support\Facades\Validator;

class CreateApplication implements CreateApplications
{
    public function create(array $input)
    {
        Validator::make($input, [
            'clientId' => ['required', 'string', 'max:255'],
            'clientSecret' => ['required', 'string', 'max:255'],
        ])->validateWithBag('createAnafApplication');
    }
}

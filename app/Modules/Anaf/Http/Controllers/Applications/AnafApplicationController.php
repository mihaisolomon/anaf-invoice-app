<?php

declare(strict_types=1);

namespace App\Modules\Anaf\Http\Controllers\Applications;

use App\Http\Controllers\Controller;
use App\Modules\Anaf\Actions\Contracts\CreateApplications;
use Illuminate\Http\Request;

class AnafApplicationController extends Controller
{
    public function store(Request $request)
    {
        $creator = app(CreateApplications::class);

        $creator->create($request->user(), $request->all());
    }
}

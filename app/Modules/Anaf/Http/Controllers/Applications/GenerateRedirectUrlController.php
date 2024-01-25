<?php

declare(strict_types=1);

namespace App\Modules\Anaf\Http\Controllers\Applications;

use App\Http\Controllers\Controller;
use App\Models\AnafApplication;
use App\Modules\Anaf\OAuth2\Client\Provider\AnafProvider;

class GenerateRedirectUrlController extends Controller
{
    public function __invoke($id)
    {
        $application = AnafApplication::find($id);

        $provider = new AnafProvider(
            $application->client_id,
            $application->client_secret,
            $application->redirect_uri,
        );

        $authorizationUrl = $provider->getAuthorizationUrl();

        return redirect($authorizationUrl);
    }
}

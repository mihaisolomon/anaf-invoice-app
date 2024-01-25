<?php

declare(strict_types=1);

namespace App\Modules\Anaf\Http\Controllers\Applications;

use App\Http\Controllers\Controller;
use App\Models\AnafApplication;
use App\Models\AnafToken;
use App\Modules\Anaf\OAuth2\Client\Provider\AnafProvider;
use Illuminate\Http\Request;

class AuthorizeController extends Controller
{
    public function __invoke($id, Request $request): void
    {
        $application = AnafApplication::find($id);

        $provider = new AnafProvider(
            $application->client_id,
            $application->client_secret,
            $application->redirect_uri,
        );

        if (!auth()->guest()) {
            $accessToken = $provider->getAccessToken('authorization_code', [
                'code' => $request->get('code'),
            ]);

            AnafToken::updateOrInsert([
                'user_id' => auth()->user()->id,
                'anaf_application_id' => $id,
            ], [
                'metadata' => json_encode([
                    'access_token' => $accessToken->getToken(),
                    'refresh_token' => $accessToken->getRefreshToken(),
                    'expires_in' => $accessToken->getExpires()
                ]),
                'expires_in' => $accessToken->getExpires()
            ]);
        }
    }
}

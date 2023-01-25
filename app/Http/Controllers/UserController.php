<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Passport\Client;
class UserController extends Controller
{
    //

    public function register(Request $request)
    {

        try {
            $data = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8'],
            ]);
        }catch (ValidationException $e){
            return response('The given data was invalid.', 400);
        }

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);
            return response()->json($user);
        }


    public function login(Request $request)
    {
        // Use the default password_client.
        // important
        // It is generated by `php artisan passport:install`
        // It is generated by `php artisan passport:install`
        // It is generated by `php artisan passport:install`

        $client = Client::where('password_client', true)->first();
        // Password client is not found.
        if (!$client) { abort(500); }
        // Make request `POST /oauth/tokens` for getting token.
        $authRequest = Request::create(
            route('passport.token'),
            'POST',
            [
                'grant_type' => 'password',
                'client_id' => $client->id,
                'client_secret' => $client->secret,
                'username' => $request->get('email'),
                'password' => $request->get('password'),
            ]);
        return app()->handle($authRequest);
    }

    public function logout(Request $request): JsonResponse
    {

        $authToken = Auth::user()->getAuthToken()->id;
//        $request->user()->token()->revoke();
//         $accessToken = Auth::user()->token();
        DB::table('oauth_access_tokens')
            ->where('id', $authToken)
            ->update([
                'revoked' => true
            ]);
        return response()->json(['status' => 'success']);
    }
}

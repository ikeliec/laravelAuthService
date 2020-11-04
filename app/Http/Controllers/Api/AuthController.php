<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

/**
 * @group Authentication
 *
 * APIs for managing users
 */
class AuthController extends Controller
{
    /**
     * Register new user
     * 
     * This endpoint is used to register a new user.
     * @unauthenticated
     * 
     * @bodyParam name string required Name of the user. Example: John Doe
     * @bodyParam email string required Email address of the user. Example: john.doe@mailinator.com
     * @bodyParam password string required Password. Example: ********
     * @bodyParam password_confirmation string required Confirm password. Example: ********
     * 
     * @response status=201 scenario="OK" {
     *  "message": "User registered successfully"
     * }
     * @response status=422 scenario="Unprocessable entity" {
     *  "message": "The given data was invalid.",
     *  "errors": {
     *    "field": [
     *        "The field is required."
     *    ],
     *    ...
     *  }
     * }
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();

        return response()->json([
            'message' => 'User registered successfully'
        ], 201);
    }

    /**
     * Login
     * 
     * This endpoint is used to authenticate a user.
     * @unauthenticated
     * 
     * @bodyParam email string required Email address of the user. Example: john.doe@mailinator.com
     * @bodyParam password string required Password. Example: ********
     * 
     * @response status=200 scenario="OK" {
     *  "user": {
     *   "id": 1,
     *   "name": "John Doe",
     *   "email": "john.doe@mailinator.com",
     *   "email_verified_at": null,
     *   "created_at": "2020-11-04T01:48:03.000000Z",
     *   "updated_at": "2020-11-04T01:48:03.000000Z"
     *  },
     *  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiNTUzOGFjYjRjYjFjN2E4OTI2ZDVhNDc5NTIxYmZiM2IzYTlmYzgwOTQ0MjI1MDY3ODMzY2FhYTRhZmQ5YmM3N2UwMTBhMjg5YmQ4YWNjOTMiLCJpYXQiOjE2MDQ0ODAyNjYsIm5iZiI6MTYwNDQ4MDI2NiwiZXhwIjoxNjA0NTY2NjY1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.kh8iMbKMpeSrLywBV9t734Zh_K6llrQxeBUt2aJnUfLw-G-rQw6o67MqdVAXtM74OsqDX-InveY8laIKGw50oniZ2YzVzqHOIbbuN3ZVe7kq8HFPziDD73296QRs0LGZxAADyZsJIU05_aLgOGvtBOz4dXXkfOlAyQ7T3p7w_JqWoBMd8PCxWn7wtN6EC8hmUQ9mAVJYLT85ucjVWEgaLeSjpWTN9g9aIUFKwtiw7sFNTSow76855rbao3u59O3rE_nKD7C9F2TC7XbuUcb1swmuo4zI_-uxVmt7qO9EsmbAjr78eps_3XZEpYxpt-RnQWSPs50K4y9pQzvmscauc1vD8ZXpEff_NR4uMTfhLockazZiM7G2O7-_RPqdELfubFSkTwb2CPklPAy6atVtwcBPULgZUa7olPP9Fs4CJvZn4rWV8rUJnou4wD2iEWwHLq5UN8wuRupUKoKPIlyPgHFVIZglXVvhlDo-FGwuprVmiNfF6xpEFKmeqnX5SjTuBKZ04tPGraclRn9PR89k_Dcw1mHFW6vVtX2iPj6ZXFx3tJVSpvmtpb67JiGK41vocd48XFMAdT5qQf2miOxRQjr-Qsp5c9Zk_Zm26ip8HasDjPk5IKgOYzXB1x4bLIqRKslUUPPdhE-NBUzapOEFr5Zb7K2kkyZE4VVXRPT4RjY",
     *  "token_type": "Bearer",
     *  "expires_at": "2020-11-05 08:57:45"
     * }
     * @response status=422 scenario="Unprocessable entity" {
     *  "message": "The given data was invalid.",
     *  "errors": {
     *    "field": [
     *        "The field is required."
     *    ],
     *    ...
     *  }
     * }
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            // 'remember_me' => 'boolean'
        ]);

        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        // if ($request->remember_me)
        //     $token->expires_at = Carbon::now()->addWeeks(1);
        // $token->save();

        return response()->json([
            'user' => $user,
            'token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Logout
     * 
     * This endpoint is used to revoke user's access token.
     * 
     * @response status=200 scenario="OK" {
     *  "message": "Token successfully revoked"
     * }
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Token successfully revoked'
        ]);
    }

    // public function welcome(Request $request)
    // {
    //     return response()->json(['message' => 'Welcome']);
    // }
}

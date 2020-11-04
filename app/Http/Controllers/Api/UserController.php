<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * @group User management
 *
 * APIs for managing users
 */
class UserController extends Controller
{
    /**
     * Fetch authenticated user record
     *
     * This endpoint is used to fetch authenticated user record
     * 
     * @response status=200 scenario="OK" {
     *  "id": 1,
     *  "name": "John Doe",
     *  "email": "john.doe@mailinator.com",
     *  "email_verified_at": null,
     *  "created_at": "2020-11-04T01:48:03.000000Z",
     *  "updated_at": "2020-11-04T01:48:03.000000Z"
     * }
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}

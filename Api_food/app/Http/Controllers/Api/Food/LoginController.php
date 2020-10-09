<?php

namespace App\Http\Controllers\Api\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class LoginController  extends Controller
{
    public function phpinfo(Request $request)
    {
        phpinfo();
    }


    public function login(Request $request)
    {

        $creds = $request->only(['email','password']);
        if (!$token = auth()->attempt($creds)) {
            return response()->json(['error' => true, 'message' => 'Incorrect Login/Password'], 401);
        }
        return response()->json(['token' => $token]);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }

}

<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Post(
 *   path="/auth/register",
 *   summary="Register a new user",
 *   tags={"Authentication"},
 *   @OA\RequestBody(
 *     @OA\MediaType(
 *       mediaType="application/json",
 *         @OA\Schema(
 *           @OA\Property(
 *             property="name",
 *             type="string"
 *           ),
 *           @OA\Property(
 *             property="email",
 *             type="string"
 *           ),
 *           @OA\Property(
 *             property="password",
 *             type="string"
 *           ),
 *           @OA\Property(
 *             property="password_confirmation",
 *             type="string"
 *           ),
 *           example={"name": "User Name", "email": "user@gmail.com", "password": "123456", "password_confirmation": "123456"}
 *         )
 *       )
 *   ),
 *   @OA\Response(
 *     response=200,
 *     description="OK"
 *   )
 * )
 */
class AuthController extends Controller{
    /**
     * Store a new user.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request){
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users|string',
            'password' => 'required|confirmed|string',
            // 'role' => 'required|in:reader,editor,admin'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => app('hash')->make($input['password']),
            // 'role' => $input['role']
        ]);

        return response()->json($user, 200);
    }
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $credentials = $request->only(['email', 'password']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return response()->json([
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::factory()->getTTL() * 60
        ], 200);
    }
}
?>
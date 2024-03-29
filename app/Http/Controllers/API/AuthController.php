<?php

namespace App\Http\Controllers\Controller\Main;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;

class AuthController extends Controller
{
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        
        $request->validate(['name' => 'required|string', 'email' => 'required|string|email|unique:users', 'password' => 'required|string|confirmed']);

        $user = new User(['name' => $request->name, 'email' => $request->email, 'password' => bcrypt($request->password)]);

        $user->save();

        Auth::login($user);

        return response()->json(['message' => 'Successfully created user!','token' => $user->createToken('MyApp')->accessToken,'id' => auth()->user()->id,], 200);
    }
  
    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate(['email' => 'required|string|email', 'password' => 'required|string', 'remember_me' => 'boolean']);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json(['message' => 'Unauthorized'], 401);
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            //$token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json(['id' => auth()->user()->id,'token' => $tokenResult->accessToken,'token_type' => 'Bearer']);
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
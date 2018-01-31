<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function authenticate(Request $request) {
       // Get only email and password from request

       $credentials = $request->only('email', 'password');

       // Get user by email
       $user = User::where('email', $credentials['email'])->first();

       // Validate Company
       if(!$user) {
         return response()->json([
           'error' => 'Invalid credentials'
         ], 401);
       }

       // Validate Password
       if (!Hash::check($credentials['password'], $user->password)) {
           return response()->json([
             'error' => 'Invalid credentials'
           ], 401);
       }

       // Generate Token
       $token = JWTAuth::fromUser($user);

       // Get expiration time
       $objectToken = JWTAuth::setToken($token);
       $expiration = JWTAuth::decode($objectToken->getToken())->get('exp');

       //save token

       $user = User::find($user->id);
       $user->remember_token = $token;
       $user->save();

       return response()->json([
         'access_token' => $token,
         'token_type' => 'bearer',
         'expires_in' => $expiration,
         'id' => $user->id
       ]);
     }

    public function index(Request $req)
    {
        //
        return ($req);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // public function __construct() {
    //    $this->middleware('jwt.auth');
    // }

    public function check(Request $req)
    {
        return response()->json(['message', 'Token Válido!'], 202);
   }
}

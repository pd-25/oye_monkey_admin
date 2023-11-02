<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginApi(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'email' => ['required','exists:users'],
            'password' => ['required', 'string'],

        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::where('email', $request->email)->first();
        if($user && Hash::check($request->password, $user->password)){
            
            return response()->json([
                'status' => true,
                'data' => $user
            ]); 
        }else{
            return response()->json([
                'status' => false,
                'data' => 'No user found',
                'test' => 'fd '
            ]);  
        }

    }

    public function registerApi(Request $request)
    {
        // dd('d');

        // $request->validate([
        //     'name' => 'required|string',
        //     'email' => 'required|email',
        //     'phone' => 'required|string',
        //     'password' => 'required|string',
        // ]);
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
            'phone' => ['required']
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $data = User::create([
            'full_name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
        ]);
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash;


class usersController extends Controller
{
     public function  getAllusers(){
        $users=  User::all();

        return response()->json([
            'status' => 200,
            'message' => 'Users',
            'data' => $users
        ]);

     }



     public function createAccount(Request $request){


        $users = new User();

        // check if user arleay exist in the database
        $existingUser=User::where('email', $request->email)->first();

        if ($existingUser){
            return response()->json([
                'status' => 400,
                'message' => 'User already exist'
            ], 400);
        }


        else{


            try {
                $users->email = $request->email;
                $users->password = $request->password;
                $users->postalCode = $request->postalCode;
                $users->street = $request->street;
                $users->city = $request->city;
                // $users->name= $request->name;
                $users->country = $request->country;
                $users->role = false;
                $users->save();


                return response()->json([
                    'status' => 200,
                    'message' => 'Account created successfully',
                    'data' => $users
                ], 200);
            
            } catch (\Throwable $th) {
                   return response()->json([
                        'status' => 500,
                        'message' => 'Internal server error',
                        'data' => $th->getMessage()
                    ], 500);  
            }
        }

     } 



     public function Login(Request $request){ $validator =$request->validate([$request->email=>"Email ir Required", 
        $request->password=>"Password is Required"]);
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return response()->json([
                'status' => 404,
                'message' => 'User not found'
            ], 404);
        };
     

    $token = $user->createToken('authToken')->plainTextToken;
    if (!Hash::check($request->password, $user->password)) {
        return response()->json([
            'status' => 400,
            'message' => 'Invalid password'
        ], 400);
    }

        return response()->json([
            'status' => 200,
            'message' => 'Login successful',
            'token'=> $token,
            'data' => $user
        ], 200);
    }

    public function Logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        // auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Logout successful'
        ], 200);
    }
}

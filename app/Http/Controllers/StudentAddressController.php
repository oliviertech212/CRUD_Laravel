<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentAddress;

class StudentAddressController extends Controller
{
    public function getAllAddress(){
        $addresses = StudentAddress::all();

         
        if ($addresses){
        $res= [
            'status' => 200,
            'message' => 'Addresses retrieved successfully.',
            'data' => $addresses];
            return  response()->json($res);


        }
    }

    public function createAddress(Request $request){
   $data = $request->all();

        echo("create student address");



        $createAdrress = StudentAddress::create([
          'postalCode' => $request->postalCode,
          'street' => $request->street,
            'city' => $request->city,
            'country' => $request->country,
        ]);

        if($createAdrress){
            return response()->json([
                'status' => 200,
                'message' => 'Address created successfully.',
                'data' => $createAdrress
            ], 200);
        }
    }
}

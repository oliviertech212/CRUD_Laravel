<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;

class StudentAddress extends Controller
{
    public function getAllAddress({
        $addresses = Address::all();


        if (addresses){

        $res= [
            'status' => 200,
            'message' => 'Addresses retrieved successfully.',
            'data' => $addresses]
            return  response()->json($res);


        }
    })

    public function createAddress(Request $request){
        $address= new Address();

        $createAdrress = Address::create([
          'state' => $request->state,
          'street' => $request->street,
            'city' => $request->city,
            'country' => $request->country,
        ]);
    }
}

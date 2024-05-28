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

        $adress = new StudentAddress();

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


    public function deleteAddress($id){
    
        $address = StudentAddress::find($id);

        if(!$address)
        {
            return response()->json([
                'status' => 404,
                'message' => 'Address not found'
            ], 404);
        }
    
        $address->delete();
    
        return response()->json([
            'status' => 200,
            'message' => 'Address deleted successfully'
        ], 200); 
    }


    public function updateAddress(Request $request)
    {
        $address = StudentAddress::find($request->id);
        $address->update([
'postalcode' => $request->postalCode,

        ]);
    }
}

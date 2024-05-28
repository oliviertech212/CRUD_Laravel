<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentAddress;
use Illuminate\Http\Request;
use Validator;

class StudentController extends Controller
{
    public function index()
    {
        // return "Hello, I'm a student from the University of Rwanda.";

        $student =Student::all();
        return response()->json([
            'status' =>200,
            'message' => 'Student data retrieved successfully.',
            'data' => $student
        ], 200);
    }

    public function create( Request $request)
    {

       

      print("create student");
       try {
        $student = new Student();

        // check if rquest student address exists
        if($request->address_id){
            $address = StudentAddress::find($request->address_id);
            if(!$address){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Address not found.',
                    'data' => null
                ], 404);
            }
        }




        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'address_id' => 'required|exists:studentaddresses,id'
          
        ]);


        if($validator->fails()){

            return response()->json([
                'status' => 'error',
                'message' => $validator->messages(),
                'data' => $validator->errors()
            ], 400);

        }
    
        else{
            $student->name = $request->name;
            $student->email = $request->email;
            $student->phone = $request->phone;
            $student->student_address_id = $request->address_id;
            $student->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Student data saved successfully.',
                'data' => $student
                
            ], 201);
        }


        // $student = Student::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'student_address_id' => $request->address_id
        // ]);

        // return response()->json([
        //     'status' => 'success',
        //     'message' => 'Student data saved successfully.',
        //     'data' => $student
        // ], 201);
      
       } catch (Exception $e) {
        print("error on create student ");
        print($e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }



    }


}

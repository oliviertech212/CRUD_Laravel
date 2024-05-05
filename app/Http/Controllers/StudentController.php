<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Validator;

class StudentController extends Controller
{
    public function index()
    {
        // return "Hello, I'm a student from the University of Rwanda.";

        $student =Student::all();

        echo($student);


        return response()->json([
            'status' => 'success',
            'message' => 'Student data retrieved successfully.',
            'data' => $student
        ], 200);
    }

    public function create( Request $request)
    {

       

    
       try {
        $student = new Student();
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'requi red|email',
            'phone' => 'required',
            'address' => 'required',
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
            $student->address = $request->address;
            $student->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Student data saved successfully.',
                'data' => $student
            ], 201);
        }
      
       } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }



    }


}

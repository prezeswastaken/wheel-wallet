<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    public function index(){

        $cars = Car::all();

        if($cars->count() > 0){

            $data = [
                'status' => 200,
                'cars' => $cars
            ];

            return response()->json($data, 200);
        }
        else{

            $data = [
                'status' => 404,
                'cars' => 'No records found'
            ];

            return response()->json($data, 404);
        }
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(),[
            'model' => 'required|string|max:50',
            'owner_id' => 'required',
            'coowner_id' => '',
            'status' => 'string|max:100'
        ]);

        if($validator->fails()){

            $data = [
                'status' => 422,
                'errors' => $validator->messages()
            ];

            return response()->json($data, 422);
        }
        else{

            $car = Car::create([
                'model' => $request->model,
                'owner_id' => Auth::user()->id,
                'coowner_id' => $request->coowner_id,
                'status' => $request->status,
                'code' => strval($request->owner_id.substr(trim($request->model), 0, 3).time())
            ]);

            if($car){

                $data = [
                    'status' => 200,
                    'message' => 'Car created successfully'
                ];
    
                return response()->json($data, 200);
            }
            else{

                $data = [
                    'status' => 500,
                    'message' => 'Something went wrong'
                ];
    
                return response()->json($data, 500);
            }
        }
    }

    public function show($id){
        $car = Car::find($id);
        
        if($car){

            $data = [
                'status' => 200,
                'car' => $car
            ];

            return response()->json($data, 200);
        }
        else{

            $data = [
                    'status' => 404,
                    'message' => 'No such car found'
                ];
    
                return response()->json($data, 404);
        }
    }
}

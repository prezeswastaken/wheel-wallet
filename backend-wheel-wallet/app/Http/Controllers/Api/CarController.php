<?php

namespace App\Http\Controllers\Api;

use App\Models\Car;
use App\Models\User;
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
                'owner_id' => $request->owner_id,
                'coowner_id' => null,
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
    public function read($id){
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }else{
        // You can then retrieve the cars associated with this user
        $cars = Car::where('owner_id', $user->id)->get();
    
        return response()->json($cars);
        }
    }
}

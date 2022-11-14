<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\CarValidation;
use App\Models\Car;
use App\Models\User;
use http\Env\Request;
use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class CarController extends Controller
{
    public function index()
    {
        return response()->json(Car::all(), 200);
    }

    public function store(CarValidation $request): \Illuminate\Http\JsonResponse
    {
        $car = Car::create([
            'name' => $request->name,
            'model' => $request->model,
            'description' => $request->description,
            'type' => $request->type,
            'price' => $request->price,
        ]);
        return response()->json($car, 200);
    }

    public function show(Car $car)
    {

        return response()->json($car, 200);
    }

    public function destroy()
    {
    }
}

<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\CarValidation;
use App\Models\Car;
use App\Models\User;
use http\Env\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class CarController extends Controller
{
    public function index()
    {
        return Car::all();
    }

    public function store(CarValidation $request): Car
    {
        $car = Car::create([
            'name' => $request->name,
            'model' => $request->model,
            'description' => $request->description,
            'type' => $request->type,
            'price' => $request->price,
        ]);
        return $car;
    }

    public function show(Car $car)
    {

        return $car;
    }

    public function destroy()
    {
    }
}

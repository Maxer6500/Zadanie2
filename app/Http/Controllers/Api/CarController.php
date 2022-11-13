<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
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

    public function store(\Illuminate\Http\Request $request): Car
    {
        $car = new Car($request->all());
        $car->save();

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

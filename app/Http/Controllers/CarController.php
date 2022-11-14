<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarValidation;
use App\Models\Car;
use Dotenv\Parser\Value;
use Dotenv\Validator;
use Exception;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CarController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('cars.index', [
            'cars' => Car::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CarValidation $request
     * @return RedirectResponse
     */
    public function store(CarValidation $request): RedirectResponse
    {

       Car::create([
            'name' => $request->name,
            'model' => $request->model,
            'description' => $request->description,
            'type' => $request->type,
            'price' => $request->price,
        ]);
        return redirect(route('cars.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Car  $car
     * @return View
     */
    public function show(Car $car): View
    {
        return view('cars.show', [
        'car' => $car
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Car $car
     * @return View
     */
    public function edit(Car $car): View
    {
        return view('cars.edit', [
            'car' => $car
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CarValidation  $request
     * @param  Car  $car
     * @return RedirectResponse
     */
    public function update(CarValidation $request, Car $car): RedirectResponse
    {

        $car->update([
            'name' => $request->name,
            'model' => $request->model,
            'description' => $request->description,
            'type' => $request->type,
            'price' => $request->price,
        ]);
        return redirect(route('cars.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {

        $car = Car::find($id);
        $car->delete();


        return redirect()->route('cars.index');
    }
}

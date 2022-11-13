<?php

namespace App\Http\Controllers;

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
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $validate = $request->validate([
            'name' => 'required|max:100',
            'model' => 'required|max:150',
            'description' => 'required|max:1000',
            'type' => 'required',
            'price' => 'required|numeric|min:0|max:99999999',
        ]);

        $car = new Car($request->all());
        $car->save();
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
     * @param  Value $value
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
     * @param  Request  $request
     * @param  Car  $car
     * @return RedirectResponse
     */
    public function update(Request $request, Car $car): RedirectResponse
    {
        $validate = $request->validate([
            'name' => 'required|max:100',
            'model' => 'required|max:150',
            'description' => 'required|max:1000',
            'type' => 'required',
            'price' => 'required|numeric|min:0|max:99999999',
        ]);

        $car->fill($request->all());
        $car->save();
        return redirect(route('cars.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Car  $car
     * @return RedirectResponse
     */
    public function destroy(Request $request, Car $car): RedirectResponse
    {
        $car->fill($request->all());
        $car->delete();

        return redirect()->route('cars.index');
    }
}

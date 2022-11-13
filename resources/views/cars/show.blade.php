@extends('layout.app')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Podgląd</div>
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Marka</label>
                                    <div class="col-md-6">
                                        <input type="text" maxlength="500" id="name" class="form-control" name="name" value="{{ $car->name }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="model" class="col-md-4 col-form-label text-md-right">Model</label>
                                    <div class="col-md-6">
                                        <input type="text" id="model" maxlength="500" class="form-control" name="model" value="{{ $car->model }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">Opis Pojazdu</label>
                                    <div class="col-md-6">
                                        <textarea id="description" maxlength="1500" class="form-control" name="description" disabled>{{$car->description}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">Typ Nadwozia</label>
                                    <div class="col-md-6">
                                        <input type="text" id="type" maxlength="500" class="form-control" name="type" value="{{ $car->type }}" disabled>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-md-4 col-form-label text-md-right">Cena</label>
                                    <div class="col-md-6">
                                        <input type="number" step="0.01" min="0" id="price" class="form-control" name="price" value="{{ $car->price }}" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <a href="{{ route('cars.index') }}">
                                        <button class="btn btn-success btn-sm">
                                            Powrót
                                        </button>
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@extends('layout.app')

@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Edycja Pojazdu</div>
                        <div class="card-body">

                            <form action="{{ route('cars.update', $car->id) }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Marka</label>
                                    <div class="col-md-6">
                                        <input type="text" maxlength="500" id="name" class="form-control" name="name" value="{{ $car->name }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="model" class="col-md-4 col-form-label text-md-right">Model</label>
                                    <div class="col-md-6">
                                        <input type="text" id="model" maxlength="500" class="form-control" name="model" value="{{ $car->model }}" required autofocus>
                                        @if ($errors->has('model'))
                                            <span class="text-danger">{{ $errors->first('model') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="description" class="col-md-4 col-form-label text-md-right">Opis Pojazdu</label>
                                    <div class="col-md-6">
                                        <textarea id="description" maxlength="1500" class="form-control" name="description" required autofocus>{{$car->description}}</textarea>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="type" class="col-md-4 col-form-label text-md-right">Typ Nadwozia</label>
                                    <div class="col-md-6">
                                        <select id="type" class="form-control" name="type" autofocus>
                                            <option selected="{{ $car->type }}">{{ $car->type }}</option>
                                            <option value="">━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━</option>
                                            <option value="miejskie">Miejskie</option>
                                            <option value="coupe">Coupe</option>
                                            <option value="kabriolet">Kabriolet</option>
                                            <option value="kombi">Kombi</option>
                                            <option value="kompakt">Kompakt</option>
                                            <option value="sedan">Sedan</option>
                                            <option value="suv">SUV</option>
                                            <option value="minivan">Minivan</option>
                                        </select>
                                        @if ($errors->has('type'))
                                            <span class="text-danger">{{ $errors->first('type') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-md-4 col-form-label text-md-right">Cena</label>
                                    <div class="col-md-6">
                                        <input type="number" step="0.01" min="0" id="price" class="form-control" name="price" value="{{ $car->price }}" required autofocus>
                                        @if ($errors->has('price'))
                                            <span class="text-danger">{{ $errors->first('price') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edytuj
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

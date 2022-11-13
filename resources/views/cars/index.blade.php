@extends('layout.app')

@section('content')
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Marka</th>
                <th scope="col">Model</th>
                <th scope="col">Opis Pojazdu</th>
                <th scope="col">Typ Nadwozia</th>
                <th scope="col">Cena</th>
                <th>
                    <a class="float-right" href="{{route('cars.create')}}">
                        <button type="button" class="btn btn-primary">DODAJ</button>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>

            @foreach($cars as $car)

                <tr>
                    <th scope="row">{{$car ->id}}</th>
                    <td>{{$car ->name}}</td>
                    <td>{{$car ->model}}</td>
                    <td>{{$car ->description}}</td>
                    <td>{{$car ->type}}</td>
                    <td>{{$car ->price}}</td>
                    <td>
                        @can('isAdmin')
                        <a href="{{ route('cars.edit', $car->id) }}">
                            <button class="btn btn-success btn-sm">
                                Edytuj
                            </button>
                        </a>
                        @endcan
                        <a href="{{ route('cars.show', $car->id) }}">
                            <button class="btn btn-primary btn-sm">
                                Podgląd
                            </button>
                        </a>
                        @can('isAdmin')
                        <form action="{{ route('cars.destroy',$car->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Usunięcie</button>
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $cars->links() }}
@endsection



@extends('layout.app')

@section('content')
    <table class="table table-dark table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nazwa</th>
            <th scope="col">Email</th>
            <th scope="col">Rola</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)

        <tr>
            <th scope="row">{{$user ->id}}</th>
            <td>{{$user ->name}}</td>
            <td>{{$user ->email}}</td>
            <td>{{$user ->role}}</td>
            <td style="display: inline-block">
                @if($user->status == 1)
                <a href="{{ route('users.status.update', ['user_id' => $user->id, 'status_code' => 0]) }}" class="btn btn-danger m-2">
                    Zbanuj
                </a>
                @else
                    <a href="{{ route('users.status.update', ['user_id' => $user->id, 'status_code' => 1]) }}" class="btn btn-success m-2">
                        Zbanowany
                    </a>
                @endif
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection



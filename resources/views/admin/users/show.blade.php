@extends('layouts.master')

@section('content')

    <h1>Usuário: {{ $user->id }}  </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Name</th>
                    <th>Facebook Id</th>
                    <th>Photo Cover</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $user->id }}</td> <td> {{ $user->name }} </td><td> {{ $user->facebook_id }} </td><td> {{ $user->photo_cover }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection
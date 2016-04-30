@extends('layouts.master')

@section('content')

    <h1>Rafael</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID.</th> <th>Name</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $rafael->id }}</td> <td> {{ $rafael->name }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection
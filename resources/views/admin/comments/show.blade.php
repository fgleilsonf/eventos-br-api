@extends('layouts.master')

@section('content')

    <h1>Comentário</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Mensagem</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $comment->id }}</td> <td> {{ $comment->message }} </td>
                </tr>
            </tbody>    
        </table>
    </div>

@endsection
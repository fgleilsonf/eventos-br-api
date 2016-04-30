@extends('layouts.master')

@section('content')

    <h1>Informações do Evento: {{ $event->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nº</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Data de Início</th>
                    <th>Data de Término </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $event->id }}</td>
                    <td> {{ $event->title }} </td>
                    <td> {{ $event->message }} </td>
                    <td> {{ $event->start_date }} </td>
                    <td> {{ $event->end_date }} </td>
                </tr>
            </tbody>    
        </table>

        <a href="{{ url('admin/events/') }}">
            <button type="submit" class="btn btn-primary btn-xs">Voltar</button>
        </a>

    </div>

@endsection
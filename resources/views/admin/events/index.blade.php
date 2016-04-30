@extends('layouts.master')

@section('content')

    <h1>Eventos <a href="{{ url('admin/events/create') }}" class="btn btn-primary pull-right btn-sm">Criar</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>Nº </th>
                    <th>Titulo</th>
                    <th>Message</th>
                    <th>Data de Início</th>
                    <th>Data de Término </th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($events as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('admin/events', $item->id) }}">{{ $item->title }}</a></td>
                    <td>{{ $item->Mensagem }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>{{ $item->end_date }}</td>
                    <td>
                        <a href="{{ url('admin/events/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Editar</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/events', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Excluir', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $events->render() !!} </div>
    </div>

@endsection

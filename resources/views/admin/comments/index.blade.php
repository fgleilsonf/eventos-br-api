@extends('layouts.master')

@section('content')

    <h1>Lista de Comentários <a href="{{ url('admin/comments/create') }}" class="btn btn-primary pull-right btn-sm">Adicionar</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Message</th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($comments as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('admin/comments', $item->id) }}">{{ $item->message }}</a></td>
                    <td>
                        <a href="{{ url('admin/comments/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Editar</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/comments', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Excluir', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $comments->render() !!} </div>
    </div>

@endsection

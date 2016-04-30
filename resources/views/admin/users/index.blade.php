@extends('layouts.master')

@section('content')

    <h1>Lista de Usuários <a href="{{ url('admin/users/create') }}" class="btn btn-primary pull-right btn-sm">Adicionar</a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th>Name</th>
                    <th>Facebook Id</th>
                    <th>Photo Cover</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($users as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td><a href="{{ url('admin/users', $item->id) }}">{{ $item->name }}</a></td><td>{{ $item->facebook_id }}</td><td>{{ $item->photo_cover }}</td>
                    <td>
                        <a href="{{ url('admin/users/' . $item->id . '/edit') }}">
                            <button type="submit" class="btn btn-primary btn-xs">Update</button>
                        </a> /
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/users', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $users->render() !!} </div>
    </div>

@endsection

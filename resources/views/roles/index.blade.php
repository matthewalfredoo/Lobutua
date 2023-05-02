@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 margin-tb mb-3">
            <div class="pull-left">
                <h3>Kelola Role User</h3>
            </div>
            <div class="pull-right">
            @can('role-create')
                <a class="btn btn-success" href="{{ route('roles.create') }}">Tambah Role</a>
            @endcan
            </div>
        </div>
    </div>

    @include('inc.messages')

    <table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>
        @foreach ($roles as $key => $role)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $role->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}"><b>Detail</b></a>
                @can('role-edit')
                    <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}"><b>Edit</b></a>
                @endcan
                @can('role-delete')
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Hapus', ['class' => 'btn btn-danger font-weight-bold', 'onclick' => "return confirm('Hapus Role?');"]) !!}
                    {!! Form::close() !!}
                @endcan
            </td>
        </tr>
        @endforeach
    </table>

    {!! $roles->render() !!}

    <p class="text-center text-primary"><small></small></p>
</div>

@endsection
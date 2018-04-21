@extends('layouts.app')

@section('title', '| Roles')

@section('content')

<div class="container">

    <ul class="nav nav-tabs">
    	<li class="nav-item">
        	<a class="nav-link" href="{{ route('users.index') }}">Users</a>
        </li>
        	<li class="nav-item">
        	<a class="nav-link active" href="{{ route('roles.index') }}">Roles</a>
        </li>
        	<li class="nav-item">
        	<a class="nav-link" href="{{ route('permissions.index') }}">Permissions</a>
        </li>
    </ul>
    <br>
    
    <div class="table-responsive">
        <table class="table table-hover">
        
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($roles as $role)
                <tr>

                    <td>{{ $role->name }}</td>

                    <td>{{ str_replace(array('[',']','"'),'', $role->permissions()->pluck('name')) }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                    <td>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                    <a class="btn btn-outline-warning btn-sm" href="{{ URL::to('roles/'.$role->id.'/edit') }}" role="button">Edit</a>
					{!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>

</div>

@endsection
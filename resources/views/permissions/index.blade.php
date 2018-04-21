@extends('layouts.app')

@section('title', '| Permissions')

@section('content')

<div class="container">
    
	<ul class="nav nav-tabs">
    	<li class="nav-item">
        	<a class="nav-link" href="{{ route('users.index') }}">Users</a>
        </li>
        	<li class="nav-item">
        	<a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
        </li>
        	<li class="nav-item">
        	<a class="nav-link  active" href="{{ route('permissions.index') }}">Permissions</a>
        </li>
    </ul>
    <br>
    
    <div class="table-responsive">
        <table class="table table-hover">

            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td> 
                    <td>

                    {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
					<a class="btn btn-outline-warning btn-sm" href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" role="button">Edit</a>
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

</div>

@endsection
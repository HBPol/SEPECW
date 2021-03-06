@extends('layouts.app')

@section('title', '| Users')

@section('content')

<div class="container">

    <ul class="nav nav-tabs">
    	<li class="nav-item">
        	<a class="nav-link active" href="{{ route('users.index') }}">Users</a>
        </li>
        	<li class="nav-item">
        	<a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date/Time Added</th>
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>

                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                    <td>{{ $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
					
					{!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
					<a class="btn btn-outline-warning btn-sm" href="{{ route('users.edit', $user->id) }}" role="button">Edit</a>
                    {!! Form::submit('Delete', ['class' => 'btn btn-outline-danger btn-sm']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>

</div>

@endsection
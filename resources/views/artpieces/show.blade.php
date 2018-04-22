@extends('layouts.app')

@section('title', '| View Art Pieces')

@section('content')

<div class="container">

    <h1>{{ $artPiece->title }}</h1>
    <hr>
    <p class="lead">{{ $artPiece->body }} </p>
    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['artpieces.destroy', $artPiece->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit entries')
    <a href="{{ route('artpieces.edit', $artPiece->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete entries')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}

</div>

@endsection
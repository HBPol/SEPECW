@extends('layouts.app')

@section('title', '| View Art Pieces')

@section('content')

<div class="container">

    <h1>{{ $artpiece->title }}</h1>
    <p>{{  $artpiece->description }}</p>
    <p>Type:&nbsp;{{ $artpiece->type }}</p>
    <p>By:&nbsp;{{ $artpiece->artist }}</p>
    <p>Price:&nbsp;&pound;{{ $artpiece->price }}</p>
    <img alt="Photo" src="/img/{{ $artpiece->filename }}">
    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['artpieces.destroy', $artpiece->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit entries')
    <a href="{{ route('artpieces.edit', $artpiece->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete entries')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}

</div>

@endsection
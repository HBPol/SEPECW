@extends('layouts.app')

@section('title', '| View News')

@section('content')

<div class="container">

    <h1>{{ $news->title }}</h1>
    <hr>
    <p class="lead">{{ $news->body }} </p>
    <hr>
    {!! Form::open(['method' => 'DELETE', 'route' => ['news.destroy', $news->id] ]) !!}
    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
    @can('Edit News')
    <a href="{{ route('news.edit', $news->id) }}" class="btn btn-info" role="button">Edit</a>
    @endcan
    @can('Delete News')
    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    @endcan
    {!! Form::close() !!}

</div>

@endsection
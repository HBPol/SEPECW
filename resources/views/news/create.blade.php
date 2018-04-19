@extends('layouts.app')
@section('title', '| Create New News')
@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">

        <h1>Create News Item</h1>
        <hr>

    {{-- Using the Laravel HTML Form Collective to create the form --}}
        {{ Form::open(array('route' => 'news.store')) }}

        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('body', 'News Body') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::submit('Create News', array('class' => 'btn btn-success btn-lg btn-block')) }}
            {{ Form::close() }}
        </div>
        </div>
    </div>
    
@endsection
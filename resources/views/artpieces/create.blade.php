@extends('layouts.app')
@section('title', '| Create Art Item')
@section('content')

<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Add a new art item</h1>
        <hr>
    	{{-- Using the Laravel HTML Form Collective to create the form --}}
        {{ Form::open(array('route' => 'artpieces.store')) }}
    
        <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('description', 'Item description') }}
            {{ Form::textarea('description', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::label('type', 'Type of piece:') }}
            {{ Form::select('type', [
            	'drawing' => 'Drawing',
            	'painting' => 'Painting',
            	'photography' => 'Photography',
            	'sculpture' => 'Sculpture',
            	], null, array('class' => 'form-control')) }}
            	<br>

            {{ Form::label('artist', 'Artist:') }}
            {{ Form::text('artist', null, array('class' => 'form-control')) }}
            <br>
    
            {{ Form::submit('Add', array('class' => 'btn btn-success btn-lg btn-block')) }}
            
            {{ Form::close() }}
        </div>
    </div>
</div>
    
@endsection
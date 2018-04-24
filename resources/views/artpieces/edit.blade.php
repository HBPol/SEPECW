@extends('layouts.app')
@section('title', '| Edit Art Piece')
@section('content')

<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Edit information</h1>
        <hr>
    	{{-- Using the Laravel HTML Form Collective to handle the form --}}
        {{ Form::model($artPiece, array('route' => array('artpieces.update', $artPiece->id), 'method' => 'PUT', 'files' => true)) }}
       
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

            {{ Form::label('price', 'Price:') }}
            {{ Form::text('price', null, array('class' => 'form-control')) }}
            <br>
            
            {{ Form::label('filename', 'Upload new image:') }}
            {{ Form::file('filename', null, array('class' => 'form-control')) }}
            <br>

            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
    </div>
    </div>
</div>

@endsection
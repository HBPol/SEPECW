@extends('layouts.app')

@section('title', '| Edit News')

@section('content')
<div class="row">

    <div class="col-md-8 col-md-offset-2">

        <h1>Edit News Item</h1>
        <hr>
            {{ Form::model($news, array('route' => array('news.update', $news->id), 'method' => 'PUT')) }}
            <div class="form-group">
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}<br>

            {{ Form::label('body', 'News Body') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}<br>

            {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

            {{ Form::close() }}
    </div>
    </div>
</div>

@endsection
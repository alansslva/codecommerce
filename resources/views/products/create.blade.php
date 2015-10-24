@extends('app')

@section('content')
    <div class="container">
        <h1>Cadastrar Produto</h1>
        {!! Form::open(array('route' => 'storeproduct')) !!}

        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name','',array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price','Price') !!}
            {!! Form::text('price','',array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description','Description') !!}
            {!! Form::textarea('description','',array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('featured','Featured') !!}
            {!! Form::checkbox('featured', '1', true) !!}
        </div>

        <div class="form-group">
            {!! Form::label('recommend','Recommend') !!}
            {!! Form::checkbox('recommend', '1', true) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Cadastrar!', array('class' => 'btn btn-lg btn-success')) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
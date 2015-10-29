@extends('app')

@section('content')
    <div class="container">
        <h1>Cadastrar Produto</h1>

        @if ($errors->any())
            <ul class="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(array('route' => 'storeproduct')) !!}

        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name','',array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category','Category') !!}
            {!! Form::select('category_id',$categories,null,array('class'=>'form-control')) !!}
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
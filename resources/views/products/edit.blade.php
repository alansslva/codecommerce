@extends('app')

@section('content')
    <div class="container">
        <h1>Editar Produto</h1>


        @if ($errors->any())
            <ul class="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(array('method' => 'put', 'route' =>  array('updateproduct', $product->id))) !!}

        <div class="form-group">
            {!! Form::label('name','Name') !!}
            {!! Form::text('name', $product->name ,array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('category','Category') !!}
            {!! Form::select('category_id',$categories,$product->category_id,array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('price','Price') !!}
            {!! Form::text('price', $product->price ,array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description','Description') !!}
            {!! Form::textarea('description', $product->description ,array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('featured','Featured') !!}
            {!! Form::checkbox('featured', '1', $product->featured) !!}
        </div>

        <div class="form-group">
            {!! Form::label('recommend','Recommend') !!}
            {!! Form::checkbox('recommend', '1', $product->recommend) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Alterar!', array('class' => 'btn btn-lg btn-success')) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
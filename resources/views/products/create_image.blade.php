@extends('app')

@section('content')
    <div class="container">
        <h1>Cadastrar Imagem</h1>

        @if ($errors->any())
            <ul class="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => ['product.image.store', $product->id] ,'method' => 'post', 'enctype' => "multipart/form-data"]) !!}

        <div class="form-group">
            {!! Form::label('image','Image') !!}
            {!! Form::file('image', null ,array('class'=>'form-control')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Cadastrar!', array('class' => 'btn btn-lg btn-success')) !!}
        </div>

        {!! Form::close() !!}

    </div>
@endsection
@extends('app')

@section('content')
    <div class="container">
        <h1>Criar categoria</h1>

        @if ($errors->any())
            <ul class="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif


        {!! Form::open(['route' => ['updatecategory', $category->id], 'method' => 'put']) !!}

        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name', $category->name ,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description', $category->description ,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Alterar Categoria', ['class' => 'btn btn-info form-control']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
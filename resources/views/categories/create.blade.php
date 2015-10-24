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


        {!! Form::open(['url' => 'admin/categories/create']) !!}

        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description','Description:') !!}
            {!! Form::textarea('description',null,['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Adicionar Categoria', ['class' => 'btn btn-success form-control']) !!}
        </div>

        {!! Form::close() !!}
    </div>
@endsection
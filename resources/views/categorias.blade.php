

@extends('app')

@section('content')
    <div class="container">
        <h1>Listagem de Categorias</h1>
        <br>
        <a href="{{ route('addcategory')  }}" class="btn btn-success">Adicionar Categoria</a>
        <table class="table table-hover table-bordered">
            <tr>
                <td><h4>#</h4></td>
                <td><h4>Nome</h4></td>
                <td><h4>Descrição</h4></td>
                <td><h4>Action</h4></td>
            </tr>
            @foreach($categories as $category)
                <tr>
                    <td>{{ $category->id  }}</td>
                    <td>{{ $category->name  }}</td>
                    <td>{{ $category->description  }}</td>
                    <td>
                        <a href="{{ route('destroycategory',['id' => $category->id]) }}"><span class="glyphicon glyphicon-trash"></span></a>
                        <a href="{{ route('editcategory',['id' => $category->id]) }}"><span class="glyphicon glyphicon-edit"></span></a>
                    </td>
                </tr>
        @endforeach
    </div>

@endsection
@extends('app')

@section('content')
    <div class="container">
        <h1>Listagem de Produtos</h1>
        <a href="{{ route('addproduct')  }}" class="btn btn-success btn-lg">Adicionar Produto</a>
        <table class="table table-hover table-bordered">
            <tr>
                <td><h4>Nome</h4></td>
                <td><h4>Descrição</h4></td>
                <td><h4>Price</h4></td>
                <td><h4>Featured</h4></td>
                <td><h4>Recommend</h4></td>
                <td><h4>Action</h4></td>
            </tr>
            @foreach($products as $produto)
                <tr>
                    <td>{{ $produto->name  }} </td>
                    <td>{{ $produto->description  }} </td>
                    <td>{{ $produto->price  }} </td>
                    <td>{{ $produto->featured  }} </td>
                    <td>{{ $produto->recommend  }} </td>
                    <td>
                        <a href="{{ route('destroyproduct',['id' => $produto->id]) }}"><span class="glyphicon glyphicon-trash"></span></a>
                        <a href="{{ route('editproduct',['id' => $produto->id]) }}"><span class="glyphicon glyphicon-edit"></span></a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection
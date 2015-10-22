@extends('app')

@section('content')
<div class="container">
    <h1>Listagem de Produtos</h1>
    <table class="table table-hover table-bordered">
        <tr>
            <td><h4>Nome</h4></td>
            <td><h4>Descrição</h4></td>
        </tr>
@foreach($products as $produto)
    <tr>
        <td>{{ $produto->name  }} </td>
        <td>{{ $produto->description  }} </td>
    </tr>
@endforeach
    </table>
</div>

@endsection
@extends('app')

@section('content')
    <div class="container">
        <h1>Imagens do {{ $product->name  }}</h1>
        <a href="{{ route('product.image.create', ['id' => $product->id]) }}" class="btn btn-success btn-lg">Adicionar Imagem</a>
        <table class="table table-hover table-bordered">
            <tr>
                <td><h4>ID</h4></td>
                <td><h4>Imagem</h4></td>
                <td><h4>Extensão</h4></td>
                <td><h4>Action</h4></td>
            </tr>

            @foreach ($product->images as $image)

                <tr>
                    <td> {{ $image->id }} </td>
                    <td><img width="120" src="{{ url('uploads/imgs/'.$image->id.'.'.$image->extension) }}" alt=""> </td>
                    <td> {{ $image->extension }} </td>
                    <td>
                        <a href="{{ route('product.image.destroy', ['id' => $image->id]) }}">Deletar</a>
                    </td>
                </tr>

            @endforeach

        </table>

        <a href="{{ route('listproduct')  }}">
            <button class="btn btn-lg">Voltar</button>
        </a>


    </div>

@endsection
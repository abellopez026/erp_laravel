@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Productos</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            @if (Session::has('save'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        El producto ha sido guardado
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            @endif
            @if (Session::has('update'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        El producto ha sido actualizado
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            @endif
            @if (Session::has('destroy'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        El producto ha sido eliminado
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <div class="card">
                <div class="row px-2 my-3">
                    <div class="col">
                        <a href="{{ route('products.create') }}" class="btn btn-outline-primary">
                            Nuevo producto
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-2">
                    <table id="table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td> {{ $product->name }}</td>
                                    <td> {{ $product->description }}</td>
                                    <td> {{ $product->price }}</td>
                                    <td> {{ $product->category->name }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('products.destroy', $product) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('products.edit', $product) }}"
                                                class="btn btn-outline-success btn-rounded mb-1"><i
                                                    class="fa-solid fa-pen"></i></a>
                                            <button type="submit" class="btn btn-outline-danger btn-rounded mb-1"><i
                                                    class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>



@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                pageLength : 5,
                lengthMenu: [[5, 10, 20], [5, 10, 20]]
            });
        });
    </script>
@stop

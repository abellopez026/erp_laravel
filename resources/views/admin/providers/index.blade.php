@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Proveedores</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            @if (Session::has('save'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        El proveedor ha sido guardado
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            @endif
            @if (Session::has('update'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        El proveedor ha sido actualizado
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            @endif
            @if (Session::has('destroy'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        El proveedor ha sido eliminado
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <div class="card">
                <div class="row px-2 my-3">
                    <div class="col">
                        <a href="{{ route('providers.create') }}" class="btn btn-outline-primary">
                            Nuevo proveedor
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-2">
                    <table id="table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Empresa</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($providers as $provider)
                                <tr>
                                    <td> {{ $provider->name }} {{ $provider->lastname }}</td>
                                    <td> {{ $provider->email }}</td>
                                    <td> {{ $provider->address }}</td>
                                    <td> {{ $provider->phone }}</td>
                                    <td> {{ $provider->business_name }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('providers.destroy', $provider) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('providers.show', $provider) }}"
                                                class="btn btn-outline-success btn-rounded mb-1"><i
                                                    class="fa-regular fa-eye"></i></a>
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

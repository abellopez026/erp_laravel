@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-12">
            @if (Session::has('save'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        El cliente ha sido guardado
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            @endif
            @if (Session::has('update'))
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                        El cliente ha sido actualizado
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
            @endif
            @if (Session::has('destroy'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        El cliente ha sido eliminado
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            <div class="card">
                <div class="row px-2 my-3">
                    <div class="col">
                        <a href="{{ route('customers.create') }}" class="btn btn-outline-primary">
                            Nuevo Cliente
                        </a>
                    </div>
                </div>

                <div class="card-body table-responsive p-2">
                    <table id="table" class="table table-hover">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Direccion</th>
                                <th>Telefono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <td> {{ $customer->name }}</td>
                                    <td> {{ $customer->lastname }}</td>
                                    <td> {{ $customer->email }}</td>
                                    <td> {{ $customer->address }}</td>
                                    <td> {{ $customer->phone }}</td>
                                    <td>
                                        <form method="POST" action="{{ route('customers.destroy', $customer) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('customers.show', $customer) }}"
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

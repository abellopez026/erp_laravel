@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Categorias</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        @if (Session::has('save'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    La categoria ha sido guardada
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
        @if (Session::has('update'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    La categoria ha sido actualizada
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        @endif
        @if (Session::has('destroy'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    La categoria ha sido eliminada
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        <div class="card">
            <div class="row px-2 my-3">
                <div class="col">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
                        Nueva Categoria
                    </button>
                </div>
            </div>

            <div class="card-body table-responsive p-2">
                <table id="table" class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $cat)
                            <tr>
                                <td> {{ $cat->name }}</td>
                                <td> {{ $cat->description }}</td>
                                <td>
                                    <form method="POST" action="{{ route('categories.destroy', $cat) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-outline-success btn-rounded mb-1" data-toggle="modal" data-target="#edit{{$cat->id}}"><i
                                                class="fa-solid fa-pen"></i></button>
                                        <button type="submit" class="btn btn-outline-danger btn-rounded mb-1"><i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                    <div class="modal fade" id="edit{{$cat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              <form action="{{route("categories.update", $cat)}}" method="POST">
                                                @method("PUT")
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre" value="{{ $cat->name}}">
                                                </div>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="description" id="description" cols="30" rows="4" placeholder="Ingrese una descripcion">{{ $cat->description}}</textarea>
                                                </div>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                              </form>
                                            </div>

                                          </div>
                                        </div>
                                      </div>
                                    </div>
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






<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route("categories.store")}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" placeholder="Ingrese el nombre">
            </div>
            <div class="form-group">
                <textarea class="form-control" name="description" id="description" cols="30" rows="4" placeholder="Ingrese una descripcion"></textarea>
            </div>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>

      </div>
    </div>
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

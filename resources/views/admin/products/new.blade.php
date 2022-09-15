@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Producto</h1>
@stop

@section('content')

    <div class="row">

        <div class="col">

            <div class="card">
                <div class="card-header">
                    @if ($errors->any())
                        <div>
                            <ul>
                                @foreach ($errors->all() as $errors)
                                    <li> {{ $errors }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @else
                    <p>Complete la siguiente informacion</p>
                    @endif
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}" placeholder="Nombre del producto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Descripcion</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description" cols="30" rows="2" placeholder="Descripcion del producto"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Precio</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="price" id="price"" value="{{old('phone')}}" placeholder="Precio del producto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Dimensiones</label>
                            <div class="col">
                                <input type="number" class="form-control" name="height" id="height"" value="{{old('phone')}}" placeholder="Altura">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="width" id="width"" value="{{old('phone')}}" placeholder="Anchura">
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="weight" id="weight"" value="{{old('phone')}}" placeholder="Peso">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Categoria</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category_id" id="category_id" aria-label="Default select example">
                                    <option selected>Seleccione una categoria</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                                    @endforeach
                                  </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-outline-primary">Guardar</button>
                                <a href="{{ route('products.index') }}" class="btn btn-outline-danger">Volver</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop

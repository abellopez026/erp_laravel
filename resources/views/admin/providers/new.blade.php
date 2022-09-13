@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nuevo Proveedor</h1>
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
                    <form class="form-horizontal" action="{{ route('providers.store') }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Apellido</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="lastname" id="lastname" value="{{old('lastname')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" id="email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName2" class="col-sm-2 col-form-label">Direccion</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="address" id="address" cols="30" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="phone" id="phone"" value="{{old('phone')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">Nombre empresa</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="business_name" id="business_name"" value="{{old('business_name')}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-outline-primary">Guardar</button>
                                <a href="{{ route('providers.index') }}" class="btn btn-outline-danger">Volver</a>
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

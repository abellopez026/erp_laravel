@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalle del Proveedor</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="https://cdn-icons-png.flaticon.com/512/219/219983.png" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $provider->name }} {{ $provider->lastname }}</h3>

                            <p class="text-muted text-center">Proveedor mayoritario</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Correo:</b> <a class="float-right">{{ $provider->email }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Telefono:</b> <a class="float-right">{{ $provider->phone }}</a>
                                </li>
                            </ul>

                            <a href="#" class="btn btn-primary btn-block"><b>Ver detalles de productos</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informacion personal</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-map-marker-alt mr-1"></i>Direccion</strong>
                            <p class="text-muted">{{ $provider->address }}</p>
                            <strong><i class="fas fa-building mr-1"></i>Empresa</strong>
                            <p class="text-muted">{{ $provider->business_name }}</p>
                        </div>

                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity"
                                        data-toggle="tab">Actividad</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Informacion</a>
                                </li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->
                                        <div class="time-label">
                                            <span class="bg-success">
                                                9 Sep. 2022
                                            </span>
                                        </div>
                                        <!-- /.timeline-label -->
                                        <!-- timeline item -->

                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 1 day ago</span>

                                                <h3 class="timeline-header border-0"><a
                                                        href="#">{{ $provider->name }}</a> realizo una entrada en stock
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="settings">
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
                                    <form class="form-horizontal" action="{{ route('providers.update', $provider) }}"
                                        method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nombre</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ $provider->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Apellido</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="lastname" id="lastname"
                                                    value="{{ $provider->lastname }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Correo</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" id="email"
                                                    value="{{ $provider->email }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Direccion</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="address" id="address" cols="30" rows="2">{{ $provider->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Telefono</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="phone" id="phone"
                                                    value="{{ $provider->phone }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Nombre empresa</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="business_name" id="business_name"
                                                    value="{{ $provider->business_name }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-outline-primary">Actualizar</button>
                                                <a href="{{ route('providers.index') }}"
                                                    class="btn btn-outline-danger">Volver</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop

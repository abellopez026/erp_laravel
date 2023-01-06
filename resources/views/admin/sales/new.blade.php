@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nueva Venta</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('content')

    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-circle-info"></i> Informacion
                </div>
                <div class="row px-4 pt-2 pb-3">
                    <div class="col-4">
                        <label for="formFile" class="form-label">No. Recibo</label>
                        <input class="form-control form-control-sm" type="number" id="invoice_no" >
                    </div>
                    <div class="col-4">
                        <label for="formFile" class="form-label">Fecha </label>
                        <input class="form-control form-control-sm" type="datetime-local" id="date" >
                    </div>
                    <div class="col-4">
                        <label for="formFile" class="form-label">Estado</label>
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="isCanceled">
                            <label class="custom-control-label" for="isCanceled"> Cancelado </label>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-user"></i> Datos del Cliente
                </div>
                <div class="row px-4 pt-2 pb-3">
                    <div class="col-4">
                        <label for="formFile" class="form-label">Nombre</label>
                        <select class="form-control form-control-sm js-customers" id="customers" onchange="setDataCustomer(event)">
                            <option data-address="" data-phone="" selected>Seleccione un cliente...</option>
                            @foreach ($customers as $c)
                            <option value="{{$c->id}}" data-address="{{$c->address}}" data-phone="{{$c->phone}}">{{$c->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4">
                        <label for="formFile" class="form-label">Direccion</label>
                        <input class="form-control form-control-sm" type="text" id="address" disabled>
                    </div>
                    <div class="col-4">
                        <label for="formFile" class="form-label">Telefono</label>
                        <input class="form-control form-control-sm" type="text" id="phone" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa-solid fa-tag"></i> Agregar producto
                </div>
                <div class="row px-4 pt-2 pb-3">
                    <div class="col-4">
                        <label for="formFile" class="form-label">Producto</label>
                        <select class="form-control form-control-sm js-customers" id="products" onchange="setDataProduct(event)">
                            <option data-price="0.00" selected>Seleccione un producto...</option>
                            @foreach ($products as $p)
                            <option value="{{$p->id}}" data-price="{{$p->price}}">{{$p->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-2">
                        <label for="formFile" class="form-label">Cant.</label>
                        <input class="form-control form-control-sm" type="text" id="cantity">
                    </div>
                    <div class="col-2">
                        <label for="formFile" class="form-label">Precio</label>
                        <input class="form-control form-control-sm" type="text" id="price">
                    </div>
                    <div class="col-2">
                        <label for="formFile" class="form-label">Stock</label>
                        <input class="form-control form-control-sm" type="text" disabled>
                    </div>
                    <div class="col-2">
                        <br>
                        <button type="button " class="btn btn-primary btn-sm" id="add"> <i class="fa-solid fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <i class="fa-sharp fa-solid fa-print"></i> Detalle de compra
                </div>
                <div class="container px-4 py-4">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>

                                <th scope="col">Nombre</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Total</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="6" style="text-align: right"> <p id="total"> <b> Total: $ 0.00  </b> </p> </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="col-12">
            <div class="row">
                <div class="col">
                    <button type="button" class="btn btn-outline-primary" id="save">Registrar venta</button>
                    <button type="button" class="btn btn-outline-danger mx-2" id="cancel">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    <script src="{{ asset('js/sales.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script type="text/javascript">
        $.ajaxSetup({
                headers: {
                    'Content-Type':'application/json',
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        function enviar() {
            
            $.ajax({
                type: 'POST',
                url: '{{ route('sales.store') }}',
                dataType: 'json',
                contentType: 'application/json',
                data: {
                    "_token": "{{ csrf_token() }}",
                    data: JSON.stringify("test")
                },
                success: function(response) {
                    console.log("DATOS ENVIADOS");
                },
                error: function(error) {
                    console.log("ERROR EN EL ENVIO");
                }
            });
        }
    </script>
@stop

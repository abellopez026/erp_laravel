@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Nueva Venta</h1>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="row">
                <!-- Columna principal para agregar productos-->
                <div class="col px-4 py-2">
                    <div>
                        <div class="form-group row">
                            <label for="inputName" class="col col-form-label">No</label>
                            <div class="col-11">
                                <input type="text" class="form-control" name="invoice_no" id="invoice_no">
                            </div>
                        </div>

                        <div class="row g-3">
                            <div class="col-6">
                                <label for="exampleDataList" class="form-label">Seleccione el cliente</label>
                                <select id="idCustomer" class="form-control" aria-label="Default select example">
                                    <option value="0" selected>Seleccione...</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }} {{ $customer->lastname }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="exampleDataList" class="form-label">Seleccione el vendedor</label>
                                <input type="text" class="form-control" id="seller" name="seller"
                                    value="{{ auth()->user()->name }}" disabled>
                            </div>
                        </div>
                        <hr>
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="exampleDataList" class="form-label">Seleccione el producto</label>
                                <select id="idProduct" onchange="" class="form-control"
                                    aria-label="Default select example">
                                    <option value="0" selected>Seleccione...</option>
                                    @foreach ($products as $product)
                                        <option data-price="{{ $product->price }}" value="{{ $product->id }}">
                                            {{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputCantity" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantity">
                            </div>
                            <div class="col-md-4">
                                <label for="inputPrice" class="form-label">Precio $</label>
                                <input type="number" class="form-control" id="price">
                            </div>
                            <div class="col-md-4">
                                <label for="inputETotal" class="form-label">Total $</label>
                                <input type="number" class="form-control" id="total" disabled>
                            </div>

                            <div class="col-12 my-3">
                                <button type="button" id="addProduct" class="btn btn-outline-primary">Agregar</button>
                                <button type="button" id="saveSale" class="btn btn-primary">Registrar Venta</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <table id="table" class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Precio Unitario</th>
                                            <th>Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody">

                                    </tbody>
                                    <tfoot style="text-align: right">
                                        <tr>
                                            <td colspan="5">Total: </td>
                                            <td id="totalFinal">$0.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                    </div>
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
@stop

@section('js')
    <script src="{{ asset('js/sales.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>

    <script>
        function ajax(json) {
            $.ajax({
                type: 'POST',
                url: '{{ route('sales.store') }}',
                contentType: 'application/json',
                data: json,
                success: function(response) {
                    window.location.href="{{route("sales.index")}}";
                },
                error: function(error) {
                    console.log("ERROR EN EL ENVIO");
                }
            });
        }
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
@stop

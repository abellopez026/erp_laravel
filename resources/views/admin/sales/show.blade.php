@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Ventas</h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <i class="fas fa-globe"></i> Detalle de Venta
                                    <small class="float-right">Date: 2/10/2014</small>
                                </h4>
                            </div>

                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                From
                                <address>
                                    <strong>Admin, Inc.</strong><br>
                                    795 Folsom Ave, Suite 600<br>
                                    San Francisco, CA 94107<br>
                                    Phone: (804) 123-5432<br>
                                    Email: info@almasaeedstudio.com
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                To
                                <address>
                                    <strong>{{ $sale->customer->name }} {{ $sale->customer->lastname }}</strong>
                                    <br> {{$sale->customer->address}} <br>
                                    Phone: {{$sale->customer->phone}}<br>
                                    Email: {{$sale->customer->email}}
                                </address>
                            </div>

                            <div class="col-sm-4 invoice-col">
                                <b>Invoice # {{$sale->invoice_no}}</b><br>
                                <br>
                                <b>Order ID:</b> 4F3S8J<br>
                                <b>Payment Due:</b> 2/22/2014<br>
                                <b>Account:</b> 968-34567
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sale->saledetail as $detail)
                                            <tr>
                                                <td>
                                                    {{$detail->product->name}}
                                                </td>
                                                <td>
                                                    {{$detail->cantity}}
                                                </td>
                                                <td>
                                                    {{$detail->price}}
                                                </td>
                                                <td>
                                                    {{$detail->total}}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <p class="lead">Payment Methods:</p>
                                <!-- PONER IMAGENES DE TARJETAS DE PAGO ACA -->
                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya
                                    handango imeem
                                    plugg
                                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                </p>
                            </div>

                            <div class="col-6">
                                <p class="lead">Amount Due 2/22/2014</p>

                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width:50%">Subtotal:</th>
                                            <td>$ {{$sale->total}}</td>
                                        </tr>
                                        <tr>
                                            <th>Impuesto:</th>
                                            <td>$ 0</td>
                                        </tr>
                                        <tr>
                                            <th>Compra:</th>
                                            <td>$ 0</td>
                                        </tr>
                                        <tr>
                                            <th>Total:</th>
                                            <td>$ {{$sale->total}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>

                        </div>



                        <div class="row no-print">
                            <div class="col-12">
                                <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                        class="fas fa-print"></i> Print</a>
                                <button type="button" class="btn btn-success float-right"><i
                                        class="far fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

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

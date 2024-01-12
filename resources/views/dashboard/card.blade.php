@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')


    <div class="d-flex flex-row-reverse">

        <button type="button" class="btn btn-info m-3">Compartir Tarjeta</button>

        <!-- Button trigger modal -->

        <button type="button" class="btn btn-warning m-3" data-toggle="modal" data-target="#exampleModal">Registrar</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('home/cliente/' . $cliente->cliente_id) }}" method="post">
                            @csrf
                            <input class="form-control" type="date" name="pago_fecha" id="">
                            <input type="submit" class="btn btn-primary mt-3" value="Registrar Pago">
                        </form>
                    </div>
                </div>
            </div>
        </div>





    </div>


    <div class="client-card">

        <div class="card">
            <h5 class="card-header">Datos Del Cliente</h5>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> {{ $cliente->cliente_nombre }}</p>
                <p class="card-text"><b>Direccion:</b> {{ $cliente->cliente_direccion }} </p>
                <p class="card-text"><b>Telefono:</b> {{ $cliente->cliente_tel }} <button
                        class="btn btn-success p-1 ml-2"><a
                            href="https://api.whatsapp.com/send?phone={{ $cliente->cliente_tel }}&text=Hola" target="_blank"
                            style="color: #fff">WhatsApp</a></button> </p>
                <p class="card-text"><b>Valor Prestado:</b> {{ $cliente->cliente_valor }}</p>
            </div>
        </div>



        <table id="clientTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                </tr>
            </thead>

            @php
                $contador = 1;
            @endphp

            <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $contador }}</td>
                        <td>{{ $pago->pago_fecha }}</td>
                    </tr>

                    @php
                        $contador++;
                    @endphp
                @endforeach



            </tbody>

        </table>


    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#clientTable').DataTable({
                "paging": false,
                "searching": false,
            });
        });
    </script>

@stop

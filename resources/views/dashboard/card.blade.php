@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')


    <div class="d-flex flex-row-reverse">

        <button type="button" class="btn btn-info m-3">Compartir Tarjeta</button>

        <form action="">
            @csrf
            <button type="button" class="btn btn-warning m-3">Guardar Cambios</button>
        </form>
    </div>


    <div class="client-card">

        <div class="card">
            <h5 class="card-header">Datos Del Cliente</h5>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> {{ $cliente->cliente_nombre }}</p>
                <p class="card-text"><b>Direccion:</b> {{ $cliente->cliente_direccion }} </p>
                <p class="card-text"><b>Telefono:</b> {{ $cliente->cliente_tel }} <button class="btn btn-success p-1 ml-2" ><a href="https://api.whatsapp.com/send?phone={{$cliente->cliente_tel}}&text=Hola"  target="_blank" style="color: #fff">WhatsApp</a></button> </p>
                <p class="card-text"><b>Valor Prestado:</b> {{ $cliente->cliente_valor }}</p>
            </div>
        </div>

        <table id="clientTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>#</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td></td>
                    <td></td>
                </tr>
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

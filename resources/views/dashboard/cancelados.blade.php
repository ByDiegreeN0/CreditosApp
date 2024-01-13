@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>TARJETAS CANCELADAS</h1>
@stop

@section('content')



    <table id="myTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Debe</th>
                <th>Compartir Tarjeta</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($cancelados as $cancelado)
                <tr>
                    <td>{{ $cancelado->cliente_nombre }}</td>
                    <td>{{ $cancelado->cliente_tel }}</td>
                    <td>{{ $cancelado->cliente_valor }}</td>
                    <td><button type="button" class="btn btn-info" id="share-card"><a id="share-link" style="color: #fff" data-url="{{ url('cliente/' . $cancelado->cliente_id) }}"><i class="fas fa-fw fa-share-nodes"></i></a></button></td>
                </tr>
            @endforeach


        </tbody>

    </table>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@stop

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": true,
                "searching": true,
            });
        });
    </script>

<script>
       
    document.addEventListener('DOMContentLoaded', function() {
        new ClipboardJS('#share-card', {
            text: function() {
                return document.getElementById('share-link').getAttribute('data-url');
            }
        });

        document.getElementById('share-card').addEventListener('click', function() {
            alert('¡URL copiada al portapapeles!');
        });
    });
</script>

@stop

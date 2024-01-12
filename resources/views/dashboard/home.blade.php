@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Clientes</h1>
@stop

@section('content')


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary  mb-4 ml-2" data-toggle="modal" data-target="#exampleModal">
        Agregar Nuevo Cliente
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Nuevo Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">

                        @csrf
                        <div class="form-group">
                            <label for="inputName">Nombre del Cliente</label>
                            <input type="text" name="cliente_nombre" class="form-control" id="inputName" placeholder="Diego Garcia..."
                                required>
                        </div>


                        <div class="form-group">
                            <label for="inputAddress">Direccion</label>
                            <input type="text" name="cliente_direccion" class="form-control" id="inputAddress"
                                placeholder="Direccion del cliente...">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputCity">Telefono</label>
                                <input type="number" name="cliente_tel" class="form-control" id="inputCity"
                                    placeholder="+57 000 000 00 00...">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputZip">Valor</label>
                                <input type="number" name="cliente_valor"  class="form-control" id="inputZip" placeholder="Valor prestado">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cliente</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <table id="myTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Telefono</th>
                <th>Debe</th>
                <th>Ver Tarjeta</th>
            </tr>
        </thead>

        <tbody>
            @foreach ( $clientes as $cliente )
            <tr>
                <td>{{ $cliente->cliente_nombre }}</td>
                <td>{{ $cliente->cliente_tel }}</td>
                <td>{{ $cliente->cliente_valor }}</td>
                <td><a href="{{ route('cliente', ['cliente_id' => $cliente->cliente_id])}}"><button class="btn btn-warning">Ver Tarjeta</button></a></td>
            </tr>
            @endforeach
            

        </tbody>

    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')



    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                "paging": true,
                "searching": true,
            });
        });
    </script>

@stop

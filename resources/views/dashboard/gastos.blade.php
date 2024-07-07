@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registro de Gastos</h1>
@stop

@section('content')

    <button type="button" class="btn btn-dark m-2 mb-4">Diario</button>
    <button type="button" class="btn btn-dark m-2 mb-4">Semanal</button>
    <button type="button" class="btn btn-dark m-2 mb-4">Mensual</button>

    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary m-2 mb-4" data-toggle="modal" data-target="#exampleModalCenter">
        Registrar Gasto
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Registra el Gasto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">¿Cuanto Gastó?</label>
                            <input type="email" class="form-control" id="exampleInputEmail1"  placeholder="Ingrese la cantidad del gasto hecho" required>

                            <label for="exampleInputEmail1">¿En que lo Gastó?</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Describa en que gastó ese dinero">

                            <input type="submit" class="btn btn-primary mt-3" value="Registrar Gasto">
                          </div>
                      </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center" style="text-align: center">Ingresado</h5>
                    <p class="text-center" style="color: #6a994e">$ +150.000</p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Gastado</h5>
                    <p class="text-center" style="color: #c1121f">$ -150.000</p>
                </div>
            </div>
        </div>


        <div class="col-sm-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Total</h5>
                    <p class="text-center">$ 150.000</p>
                </div>
            </div>
        </div>

    </div>

    <table id="gastosTable" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Fecha</th>
                <th>Descripcion del gasto</th>
                <th>Cantidad Gastada</th>
            </tr>
        </thead>

        @php
            $contador = 1;
        @endphp

        <tbody>
            
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

             



        </tbody>

    </table>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">

@stop

@section('js')



    <script>
        $(document).ready(function() {
            $('#gastosTable').DataTable({
                "paging": true,
                "searching": true,
            });
        });
    </script>

@stop

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tarjeta personal del cliente</h1>
@stop

@section('content')

    <div class="d-flex flex-row-reverse">

        <!-- Modal -->
        <div class="modal fade" id="opcionesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Opciones</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <button type="button" class="btn btn-warning m-3" data-toggle="modal"
                            data-target="#exampleModal">Registrar Abono</button>



                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Registrar Abono</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>


                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('home/cliente/' . $cliente->cliente_id) }}" method="post">
                                            @csrf

                                            <div class="form-group">
                                                <label for="pago_fecha_input">Fecha de pago </label>
                                                <input class="form-control" type="date" name="pago_fecha" id="pago_fecha_input" required>

                                                <label for="pago_cantidad_input">Cantidad Abonada</label>
                                                <input class="form-control" type="number" name="pago_cantidad" id="pago_cantidad_input" required placeholder="Ingrese la cantidad abonada">

                                            </div>



                                            <input type="submit" class="btn btn-primary mt-3" value="Registrar Pago">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" class="btn btn-info m-3" id="share-card"><a id="share-link"
                                style="color: #fff" data-url="{{ url('cliente/' . $cliente->cliente_id) }}"><i
                                    class="fas fa-fw fa-share-nodes"></i>Compartir Tarjeta</a></button>

                        <button class="btn btn-danger m-3"><a href="{{ url('/cliente/edit/' . $cliente->cliente_id) }}"
                                class="text-white">Editar Tarjeta</a></button>

                    </div>
                </div>
            </div>
        </div>





    </div>


    <div class="client-card">

        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Datos Del Cliente</h4>
                    <button type="button" class="btn btn-primary m-3" data-toggle="modal" data-target="#opcionesModal" style="color: #fff"><i class="fa-solid fa-plus"></i></button>

                </div>
            </div>

            <div class="card-header">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success ml-2"><a href="https://api.whatsapp.com/send?phone={{ $cliente->cliente_tel }}&text=Hola" target="_blank" style="color: #fff"><i class="fab fa-whatsapp"></i> Enviar Mensaje</a></button>
                    <button class="btn btn-dark ml-4"><a href="" style="color: #fff" target="_blank"><i class="fa-solid fa-phone"></i> Llamar</a></button>
                </div>

            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> {{ $cliente->cliente_nombre }}</p>
                <p class="card-text"><b>Direccion:</b> {{ $cliente->cliente_direccion }} </p>
                <p class="card-text"><b>Telefono:</b> {{ $cliente->cliente_tel }}</p>
                <p class="card-text"><b>Valor Prestado:</b> {{ $cliente->cliente_valor }}</p>
                <p class="card-text"><b>Saldo Restante:</b></p>
            </div>
        </div>

        <form action="/cliente/cancelar/{{ $cliente->cliente_id }}" class="cancelar-form" method="post">
            @csrf
            @method('PATCH')
            <input type="hidden" name="cancelado" id="" value="cancelado" required>
            <p><b>*Si el cliente ya culminó los pagos puedes:</b></p><input type="submit" class="btn btn-danger"
                value="Cancelar Tarjeta">
        </form>


        <table id="clientTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Fecha</th>
                    <th>Cantidad Abonada</th>
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
                        <td>{{ $pago->pago_abono }}</td>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

@stop

@section('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- Sweet Alert -->


    <script>
        $(document).ready(function() {
            $('#clientTable').DataTable({
                "paging": false,
                "searching": false,
            });

            $('.cancelar-form').submit(function(e) {
                e.preventDefault()

                Swal.fire({
                    title: "Estas Seguro?",
                    text: "Estas apunto de cancelar esta tarjeta, esto significa que el cliente ya ha terminado su pago.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, Cancelar tarjeta"
                }).then((result) => {
                    if (result.isConfirmed) {
                        this.submit()
                    }
                });
            })


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

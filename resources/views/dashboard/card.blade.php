@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
@stop

@section('content')

    <div class="d-flex flex-row-reverse">





        <button type="button" class="btn btn-warning m-3" data-toggle="modal" data-target="#opcionesModal">Opciones</button>
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
                            data-target="#exampleModal">Registrar</button>

                      

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            <input class="form-control" type="date" name="pago_fecha" id=""
                                                required>
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
                    <button class="btn btn-success"><a
                            href="https://api.whatsapp.com/send?phone={{ $cliente->cliente_tel }}&text=Hola" target="_blank"
                            style="color: #fff"><i class="fab fa-whatsapp"></i></a></button>
                </div>
            </div>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> {{ $cliente->cliente_nombre }}</p>
                <p class="card-text"><b>Direccion:</b> {{ $cliente->cliente_direccion }} </p>
                <p class="card-text"><b>Telefono:</b> {{ $cliente->cliente_tel }}</p>
                <p class="card-text"><b>Valor Prestado:</b> {{ $cliente->cliente_valor }}</p>
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

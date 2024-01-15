@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Editar los datos del cliente</h1>
<b><p>Esta sección es usada especificamente para editar los datos del cliente.</p></b>
@stop

@section('content')




    <div class="client-card">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4>Datos Del Cliente</h4>
                  
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('update_cliente', ['cliente_id' => $cliente->cliente_id]) }}" method="post">
                    @csrf
                    @method('patch')
                    <p class="card-text"><b>Nombre:</b> <input  class="form-control"  type="text" required value="{{ $cliente->cliente_nombre }}" placeholder="Nombre" name="cliente_nombre"></p>
                    <p class="card-text"><b>Direccion:</b> <input  class="form-control" type="text" required value="{{ $cliente->cliente_direccion }}" placeholder="Direccion" name="cliente_direccion"></p>
                    <p class="card-text"><b>Telefono:</b> <input  class="form-control" type="number" required value="{{ $cliente->cliente_tel }}" placeholder="Telefono" name="cliente_tel"></p>
                    <p class="card-text"><b>Valor Prestado:</b> <input class="form-control"  type="number" required value="{{ $cliente->cliente_valor }}" placeholder="Valor Prestado" name="cliente_valor"></p>
                    <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                </form>
            </div>
        </div>
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

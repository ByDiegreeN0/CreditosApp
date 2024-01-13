<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Tarjeta Digital - CreditosAPP</title>
</head>
<body>
    <div class="client-card m-5">

        <div class="card">
            <h5 class="card-header">Tarjeta Digital</h5>
            <div class="card-body">
                <p class="card-text"><b>Nombre:</b> {{ $cliente->cliente_nombre }}</p>
                <p class="card-text"><b>Direccion:</b> {{ $cliente->cliente_direccion }} </p>
                <p class="card-text"><b>Telefono:</b> {{ $cliente->cliente_tel }}</p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>

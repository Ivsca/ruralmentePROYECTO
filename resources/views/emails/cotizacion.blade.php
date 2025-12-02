<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f7;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            background: white;
            margin: 40px auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h2 {
            color: #2c7a7b;
            border-bottom: 2px solid #e2e8f0;
            padding-bottom: 8px;
        }
        p {
            font-size: 15px;
            color: #333;
            margin: 6px 0;
        }
        .label {
            font-weight: bold;
            color: #2d3748;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            color: #718096;
            font-size: 13px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Nueva solicitud de cotización 📩</h2>

        <p><span class="label">Empresa:</span> {{ $data['empresa'] }}</p>
        <p><span class="label">Nombre:</span> {{ $data['nombre'] }}</p>
        <p><span class="label">Cargo:</span> {{ $data['cargo'] }}</p>
        <p><span class="label">Correo:</span> {{ $data['correo'] }}</p>
        <p><span class="label">Teléfono:</span> {{ $data['telefono'] }}</p>
        <p><span class="label">Paquete de interés:</span> {{ $data['paquete'] }}</p>
        <p><span class="label">Número de participantes:</span> {{ $data['participantes'] }}</p>

        <br>

        <p><span class="label">Descripción del proyecto:</span></p>
        <p style="background:#f7fafc; padding:12px; border-radius:8px;">
            {{ $data['proyecto'] }}
        </p>

        <div class="footer">
            Este correo fue generado automáticamente por el formulario de Ruralmente.
        </div>
    </div>

</body>
</html>

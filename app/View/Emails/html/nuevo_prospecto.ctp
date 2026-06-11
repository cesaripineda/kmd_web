<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        .email-container {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.05);
        }
        .header {
            background-color: #0056b3;
            color: #ffffff;
            padding: 25px;
            text-align: center;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }
        .content {
            padding: 30px;
            background-color: #ffffff;
        }
        .section-title {
            color: #0056b3;
            font-size: 18px;
            font-weight: 700;
            margin-top: 20px;
            margin-bottom: 15px;
            border-bottom: 2px solid #f0f0f0;
            padding-bottom: 5px;
        }
        .data-row {
            margin-bottom: 12px;
            line-height: 1.5;
        }
        .label {
            font-weight: bold;
            color: #555;
            width: 150px;
            display: inline-block;
        }
        .value {
            color: #222;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h2>Nueva Solicitud de Certificación</h2>
        </div>
        <div class="content">
            <p>Se ha recibido un nuevo registro a través del formulario de prospección:</p>

            <div class="section-title">Información del Negocio</div>
            <div class="data-row">
                <span class="label">Nombre:</span>
                <span class="value"><?php echo h($datos['nombre']); ?></span>
            </div>
            <div class="data-row">
                <span class="label">Dirección:</span>
                <span class="value"><?php echo h($datos['direccion']) . ', ' . h($datos['ciudad']) . ', ' . h($datos['estado']) . ' (CP: ' . h($datos['codigo_postal']) . ')'; ?></span>
            </div>
            <div class="data-row">
                <span class="label">Teléfono:</span>
                <span class="value"><?php echo h($datos['telefonos']); ?></span>
            </div>
            <div class="data-row">
                <span class="label">Sitio Web:</span>
                <span class="value"><?php echo h($datos['pagina_web']); ?></span>
            </div>

            <div class="section-title">Información de Contacto</div>
            <div class="data-row">
                <span class="label">Responsable:</span>
                <span class="value"><?php echo h($datos['nombre_responsable']); ?></span>
            </div>
            <div class="data-row">
                <span class="label">Correo:</span>
                <span class="value"><?php echo h($datos['email_responsable']); ?></span>
            </div>
            <div class="data-row">
                <span class="label">Teléfono:</span>
                <span class="value"><?php echo h($datos['telefono_responsable']); ?></span>
            </div>
            <div class="data-row">
                <span class="label">Celular:</span>
                <span class="value"><?php echo h($datos['celular_responsable']); ?></span>
            </div>

            <div class="section-title">Información Adicional</div>
            <div class="data-row">
                <span class="label">Referido por:</span>
                <span class="value"><?php echo h($datos['referido']); ?></span>
            </div>
            <div class="data-row">
                <span class="label">Actividad:</span>
                <span class="value"><?php echo h($datos['actividad_comercial']); ?></span>
            </div>
            <div class="data-row">
                <span class="label">Motivo:</span>
                <span class="value"><?php echo h($datos['motivo_certificacion']); ?></span>
            </div>
        </div>
        <div class="footer">
            Este es un correo automático generado por el Sistema KMD.
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error de Conexión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f2f4f7;
            text-align: center;
            padding-top: 10%;
            color: #333;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #b71c1c;
        }
        p {
            margin-top: 10px;
            color: #555;
        }
        .spinner {
            margin: 20px auto;
            border: 4px solid #ccc;
            border-top: 4px solid #b71c1c;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        small {
            display: block;
            color: #777;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Error de conexión a la base de datos</h1>
        <p>No se puede conectar con el servidor. Intentando reconectar...</p>
        <div class="spinner"></div>
        <small>Reintentando cada 5 segundos</small>
    </div>

    <script>
        // Reintenta cada 5 segundos si ya hay conexión
        async function checkConnection() {
            try {
                // Intentamos un fetch al endpoint del login o home
                const res = await fetch("{{ route('login') }}", { method: 'GET' });
                if (res.ok) {
                    // Si la conexión volvió, redirigimos
                    window.location.href = "{{ route('login') }}";
                }
            } catch (e) {
                // Si sigue sin conexión, esperamos
            } finally {
                setTimeout(checkConnection, 5000);
            }
        }

        checkConnection();
    </script>
</body>
</html>

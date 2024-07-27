    <style>
        /* Estilos básicos para la página */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        .navbar-user {
            background-color: #f8f9fa;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        .user-options {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }
        .user-options li {
            margin-right: 20px;
        }
        .user-options button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        .user-options button:hover {
            background-color: #0056b3;
        }
        .container {
            padding: 20px;
        }
        .recent-activity, .recommendations, .quick-access, .notifications, .order-history, .user-profile {
            margin-bottom: 20px;
        }
        .recommendations .products, .order-history ul {
            list-style: none;
            padding: 0;
        }
        .product-item, .order-history li {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            text-align: center;
        }
        .product-item img {
            max-width: 100%;
        }
        .settings-panel button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
        }
        .settings-panel button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

    <div class="navbar-user">
        <ul class="user-options">
            <li><a href="http://localhost?C=userController&M=index">Inicio</a></li>
            <li><a href="http://localhost?C=userController&M=MisCompras">Mis compras</a></li>
            <button onclick="window.location.href = 'http://localhost?C=userController&M=LogOut';">Cerrar sesión</button>
        </ul>
    </div>

    <div class="container">
        <h1>Javier Hernandez</h1>

        <div class="recent-activity">
            <h2>Actividad Reciente</h2>
            <ul>
                <li>Pedido #12345 - Entregado el 10 de julio</li>
                <li>Has visto: [Producto 1], [Producto 2]</li>
            </ul>
        </div>

        <div class="recommendations">
            <h2>Recomendaciones para Ti</h2>
            <div class="products">
                <div class="product-item">
                    <img src="ruta/a/imagen1.jpg" alt="Nombre del Producto 1">
                    <p>Nombre del Producto 1</p>
                    <p>$Precio</p>
                </div>
                <div class="product-item">
                    <img src="ruta/a/imagen2.jpg" alt="Nombre del Producto 2">
                    <p>Nombre del Producto 2</p>
                    <p>$Precio</p>
                </div>
                <!-- Más productos -->
            </div>
        </div>

        <div class="quick-access">
            <h2>Accesos Rápidos</h2>
            <ul>
                <li><a href="/perfil">Mi Perfil</a></li>
                <li><a href="/mis-compras">Historial de Compras</a></li>
                <li><a href="/metodos-pago">Métodos de Pago</a></li>
                <li><a href="/configuracion">Configuración de Cuenta</a></li>
            </ul>
        </div>

        <div class="notifications">
            <h2>Notificaciones</h2>
            <div class="notification-item">
                <p>Tienes una nueva mensaje del soporte.</p>
                <a href="/mensajes">Ver mensajes</a>
            </div>
        </div>

        <div class="order-history">
            <h2>Historial de Pedidos</h2>
            <ul>
                <li>
                    <a href="/pedido/12345">Pedido #12345 - $500 - 10 de julio</a>
                </li>
                <!-- Más pedidos -->
            </ul>
        </div>

        <div class="user-profile">
            <h2>Perfil del Usuario</h2>
            <p><strong>Nombre:</strong> [Nombre del Usuario]</p>
            <p><strong>Correo Electrónico:</strong> [Correo del Usuario]</p>
            <!-- Más detalles del perfil -->
        </div>

        <div class="settings-panel">
            <h2>Configuración de Cuenta</h2>
            <button onclick="window.location.href = '/cambiar-contrasena';">Cambiar Contraseña</button>
            <button onclick="window.location.href = '/actualizar-direccion';">Actualizar Dirección</button>
            <button onclick="window.location.href = '/configuracion';">Configuración de Cuenta</button>
        </div>
    </div>
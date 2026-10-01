<?php
class VentaService {
    public function __construct(private InterfazStockConnector $conector) {}

    public function procesar(DTOVenta $venta) {
        $productos = array_map(function(array $producto) {
            return [
                'codigo' => $producto['codigo'],
                'cantidad' => $producto['cantidad']
            ];
        }, $venta->productos);

        $movimiento = new DTOMovimiento(
            tipoMovimiento: 'SALIDA',
            fecha: $venta->fecha,
            referencia: "VENTA-" . $venta->ventaId,
            productos: $productos
		);

		$this->conector->registrarMovimiento($movimiento);
    }
}
?>

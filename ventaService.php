<?php
class VentaService {
    public function __construct(private InterfazStockConnector $conector) {}

    public function procesar(DTOVenta $venta) {
        if (empty($venta->productos)) throw new Exception("La venta no puede estar vacia");

        foreach ($venta->productos as $producto) {
            if (!isset($producto['codigo'], $producto['cantidad'])) throw new Exception("Cada producto debe tener codigo y cantidad");

            if ($producto['cantidad'] <= 0) throw new Exception("La cantidad debe ser mayor a 0");
        }

        $productos = array_map(function(array $producto) {
            return [
                'codigoProducto' => $producto['codigo'],
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

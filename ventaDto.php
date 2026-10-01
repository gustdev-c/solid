<?php


class DTOVenta {
    public function __construct(public int $ventaId, public string $fecha, public int $cajeroId, public array $productos) {}

    public function convertirAArreglo() {
        return ['ventaId' => $this->ventaId,
                'fecha' => $this->fecha,
                'cajeroId' => $this->cajeroId,
                'productos' => $this->productos];
    }
}
?>

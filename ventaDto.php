<?php

// Este es el DTO de venta. Comentario añadido por si necesito hacer cambios, ya que tuve varias confusiones

class DTOVenta {
    public function __construct(public int $ventaId, public string $fecha, public int $cajeroId, public array $productos) {}
}
?>

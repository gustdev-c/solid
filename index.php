<?php
    require_once 'ventaDto.php';
    require_once 'movimientoDto.php';
    require_once 'stockConnectorInterfaz.php';
	require_once 'stockConnector.php';
	require_once 'stockConnectorFalso.php';
    require_once 'ventaController.php';
    require_once 'ventaService.php';

	// $conector = new StockConnector();
	$conectorFalso = new StockConnectorFalso();

    $servicio = new VentaService($conector);
    $controlador = new VentaController($servicio);

    $controlador->procesar();
?>

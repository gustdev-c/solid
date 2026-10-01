<?php
    require_once 'ventaDto.php';
    require_once 'movimientoDto.php';
    require_once 'stockConnectorInterfaz.php';
	require_once 'stockConnector.php';
	require_once 'stockConnectorFalso.php';
    require_once 'ventaController.php';
    require_once 'ventaService.php';

    // Para probar sin requerir localhost, descomente una linea y comente la otra
	// $conector = new StockConnector();
	$conector = new StockConnectorFalso();

    $servicio = new VentaService($conector);
    $controlador = new VentaController($servicio);

    $controlador->procesar();
?>

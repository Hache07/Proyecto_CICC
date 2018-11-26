<?php

/*if(!isset($_POST['submit'])) {
	exit("Hubo un error");
}*/
use PayPal\Api\Payer;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;

require 'includes/paypal.php';

if(isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$regalo = $_POST['regalo'];
	$total = $_POST['total_pedido'];
	$fecha = date('Y-m-d H:i:s');

	$boletos = $_POST['boletos'];
	$numero_boletos = $boletos;
	$camisas = $_POST['pedido_extra']['camisas']['cantidad'];
	$precioCamisa = $_POST['pedido_extra']['camisas']['precio'];
	$pedidoExtra = $_POST['pedido_extra'];
	include_once 'includes/funciones/funciones.php';
	$pedido = productos_json($boletos, $camisas);

	echo "<pre>";
		var_dump($pedidoExtra);
	echo "</pre>";

	try {
		require_once('includes/funciones/conexion.php');
		$stmt = $conexion->prepare("INSERT INTO registrados (nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, regalo, total_pagado) VALUES (?,?,?,?,?,?,?)");
		$stmt->bind_param("sssssis", $nombre, $apellido, $email, $fecha, $pedido, $regalo, $total);
		$stmt->execute();
		$stmt->close();
		$conexion->close();
	} catch (Exception $e) {
		$error = $e->getMessage();
	}

}

$compra = new Payer();
$compra->setPaymentMethod('paypal');

$articulo = new Item();
$articulo->setName($producto)
		 ->setCurrency('USD')
		 ->setQuantity(1)
		 ->setPrice($precio);

$i = 0;
foreach ($numero_boletos as $key => $value) {
	if((int)$value['cantidad'] > 0) {

		${"articulo$i"} = new Item;
		${"articulo$i"}->setName('Pase: '.$key)
					   ->setCurrency('USD')
					   ->setQuantity((int)$value['cantidad'])
					   ->setPrice((int)$value['precio']);
		$i++;
	}
}

foreach ($pedidoExtra as $key => $value) {
	if((int)$value['cantidad'] > 0) {
		if($key == 'camisas') {
			$precio = (float) $value['precio'] * .93;
		} else {
			$precio = (int) $value['precio'];
		}

		${"articulo$i"} = new Item;
		${"articulo$i"}->setName('Extras: '.$key)
					   ->setCurrency('USD')
					   ->setQuantity((int)$value['cantidad'])
					   ->setPrice($precio);
		$i++;
	}
}

echo $articulo2->getName();
		 /*
$listaArticulos = new ItemList();
$listaArticulos->setItems(array($articulo));

$detalles = new Details();
$detalles->setShipping($envio)
		 ->setSubtotal($precio);

$cantidad = new Amount();
$cantidad->setCurrency('USD')
		 ->setTotal($total)
		 ->setDetails($detalles);

$transaccion = new transaction();
$transaccion->setAmount($cantidad)
			->setItemList($listaArticulos)
			->setDescription('Pago ')
			->setInvoiceNumber(uniqid());

$redireccionar = new RedirectUrls();
$redireccionar->setReturnUrl(URL_SITIO."pago_finalizado.php?exito=true")
			  ->setCancelUrl(URL_SITIO."pago_finalizado.php?exito=false");

$pago = new Payment();
$pago->setIntent("sale")
	 ->setPayer($compra)
	 ->setRedirectUrls($redireccionar)
	 ->setTransactions(array($transaccion));

try {
	$pago->create($apiContext);
} catch(\PayPal\Exception\PayPalConnectionException $pce) {
	echo "<pre>";
	print_r(json_decode($pce->getData()));
	exit;
	echo "</pre>";
}

$aprobado = $pago->getApprovalLink();

header("location: {$aprobado}");
*/
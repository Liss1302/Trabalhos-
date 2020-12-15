<?php

	require("../../domain/connection.php");
	require("../../domain/Compras.php");

	class ComprasProcess {
		var $cd;

		function doGet($arr){  //head & headAll
			$cd = new ComprasDAO();
			if($arr["number_compra"]==0){
				$result = $cd->readAll();
			}else{
				$result = $cd->read($arr["number_compra"]);
			}
			http_response_code(200);
			echo json_encode($result);
		}

		function doPost($arr){ //create
			$cd = new ComprasDAO();
			$compra = new Compras();
			$compra->setNumber_compra($arr["number_compra"]);
			$compra->setLocalComprado($arr["localComprado"]);
			$compra->setDataCompra($arr["datacompra"]);
			$sucess = $cd->create($compra);

			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){  //UPDATE
			$cd = new ComprasDAO();
			$compra = new Compras();
			$compra->setNumber_compra($arr["number_compra"]);
			$compra->setlocalComprado($arr["localcomprado"]);
			$compra->setDataCompra($arr["datacompra"]);
			$sucess = $cd->update($compra);
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$cd = new ComprasDAO();
			$sucess = $cd->delete($arr["Number_compra"]);
			http_response_code(200);
			echo json_encode($sucess);
		}
	}
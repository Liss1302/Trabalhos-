<?php

	require("../../domain/connection.php");
	require("../../domain/Vendas.php");

	class VendasProcess {
		var $vd;

		function doGet($arr){
			$vd = new VendasDAO();
			if($arr["number_compra"]==0){
				$result = $vd->readAll();
			}else{
				$result = $vd->read($arr["number_compra"]);
			}
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPost($arr){
			$vd = new VendasDAO();
			venda = new Vendas();
			$venda->setNumber_compra($arr["number_compra"]);
			$venda->setNomeComprador($arr["nomecomprador"]);
			$venda->setDataCompra($arr["datacompra"]);
			$sucess = $vd->create($venda);
		
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$vd = new VendasDAO();
			$venda->setNumber_compra($arr["numbervenda"]);
			$venda->setNomeComprador($arr["nomecomprador"]);
			$venda->setDataCompra($arr["datacompra"]);
			$sucess = $vd->update($venda);
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$vd = new VendasDAO();
			$sucess = $vd->delete($arr["number_compra"]);
			http_response_code(200);
			echo json_encode($sucess);
		}
	}
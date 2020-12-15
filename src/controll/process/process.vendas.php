<?php

	require("../../domain/connection.php");
	require("../../domain/Vendas.php");

	class VendasProcess {
		var $vd;

		function doGet($arr){
			$vd = new VendasDAO();
			if($arr["number_venda"]==0){
				$result = $vd->readAll();
			}else{
				$result = $vd->read($arr["number_venda"]);
			}
			http_response_code(200);
			echo json_encode($result);
		}


		function doPost($arr){
			$vd = new VendasDAO();
			$venda = new Vendas();
			$venda->setNumber_venda($arr["number_venda"]);
			$venda->setNomeComprador($arr["nomeComprador"]);
			$venda->setDataVenda($arr["dataVenda"]);
			$sucess = $vd->create($venda);
		
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$vd = new VendasDAO();
			$venda->setNumber_venda($arr["number_venda"]);
			$venda->setNomeComprador($arr["nomeComprador"]);
			$venda->setDataVenda($arr["dataVenda"]);
			$sucess = $vd->update($venda);
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$vd = new VendasDAO();
			$sucess = $vd->delete($arr["number_venda"]);
			http_response_code(200);
			echo json_encode($sucess);
		}
	}
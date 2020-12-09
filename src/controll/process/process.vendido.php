<?php

	require("../../domain/connection.php");
	require("../../domain/Vendido.php");

	class VendidoProcess {
		var $vd;

		function doGet($arr){
			$vd = new VendidoDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPost($arr){
			$vd = new VendidoDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$vd = new VendidoDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$vd = new VendidoDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}
	}
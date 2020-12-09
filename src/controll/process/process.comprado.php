<?php

	require("../../domain/connection.php");
	require("../../domain/Comprado.php");

	class CompradoProcess {
		var $cd;

		function doGet($arr){
			$cd = new CompradoDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPost($arr){
			$cd = new CompradoDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$cd = new CompradoDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$cd = new CompradoDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}
	}
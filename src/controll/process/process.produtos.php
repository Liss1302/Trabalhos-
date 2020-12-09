<?php

	require("../../domain/connection.php");
	require("../../domain/Produtos.php");

	class ProdutosProcess {
		var $pd;

		function doGet($arr){
			$pd = new ProdutosDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPost($arr){
			$pd = new ProdutosDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doPut($arr){
			$pd = new ProdutosDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$pd = new ProdutosDAO();
			$sucess = "use to result to DAO";
			http_response_code(200);
			echo json_encode($sucess);
		}
	}
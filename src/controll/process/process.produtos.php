<?php

	require("../../domain/connection.php");
	require("../../domain/Produtos.php");

	class ProdutosProcess {
		var $pd;

		function doGet($arr){
			$pd = new ProdutosDAO();
			if($arr["id_produto"]==0){
				$result = $pd->readAll();
			}else{
				$result = $pd->read($arr["id_produto"]);
			}
			http_response_code(200);
			echo json_encode($result);
		} //funcionando(teste com insominia)


		function doPost($arr){
			$pd = new ProdutosDAO();
			$produto = new Produtos();
			$produto->setId_produto($arr["id_produto"]);
			$produto->setNome($arr["nome"]);
			$produto->setFabricante($arr["fabricante"]);
			$sucess = $pd->create($produto);

			http_response_code(200);
			echo json_encode($sucess);
		
		}


		function doPut($arr){
			$pd = new ProdutosDAO();
			$produto = new Produtos;
			$produto->setId_produto($arr["id_Produto"]);
			$produto->setNome($arr["nome"]);
			$produto->setFabricante($arr["fabricante"]);
			$sucess = $pd->update($produto);
			http_response_code(200);
			echo json_encode($sucess);
		}


		function doDelete($arr){
			$pd = new ProdutosDAO();
			$sucess = $pd->delete($arr["id_Produto"]);
			http_response_code(200);
			echo json_encode($sucess);
		}
	}
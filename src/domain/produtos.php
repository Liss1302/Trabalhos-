<?php

	class Produtos {
		var $id_Produto;
		var $nome;
		var $fabricante;

		function getId_Produto(){
			return $this->id_Produto;
		}
		function setId_Produto($id_Produto){
			$this->id_Produto = $id_Produto;
		}

		function getNome(){
			return $this->nome;
		}
		function setNome($nome){
			$this->nome = $nome;
		}

		function getFabricante(){
			return $this->fabricante;
		}
		function setFabricante($fabricante){
			$this->fabricante = $fabricante;
		}
	}

	class ProdutosDAO {
		function create($Produtos) {
			$result = array();
			$query = "SELECT * FROM produtos";

			try {
				$con = new Connection();
				$result = array();
				$id_produto = $produto->getId_Produto();
				$nome = $produto->getNome();
				$fabricante = $produto->getFabricante();
				$query = "INSERT INTO Produto VALUES ($id_Produto,'$nome','$fabricante')";
				if(Connection::getInstance()->exec($query)>= 1){
					$result["mensagem"] = "Produto criado com sucesso!";
				}else{
					$result["erro"] = "Produto já existe";
				}
			}catch(PDOException $e) {
				$result["erro"] = "Erro de conexao com o Bd";
			}
			return $result;
		}

		function readAll() {  //funcionando
			$result = array();
				$query = "SELECT * FROM produtos";

				try {
				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
					$produto = new Produtos();
					$produto->setId_Produto($row->id_produto);
					$produto->setNome($row->nome);
					$produto->setFabricante($row->fabricante);
					$result [] = $produto;
				}
				$con = null;
			}catch(PDOException $e) {
				$result["err"] = "Erro de conexao com BD";
			}
			return $result;
		}

		function read($id_produto) { //read e headAll funcionando
			$result = array();
				$query = "SELECT * FROM produtos WHERE id_produto = $id_produto";

				try {
				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
					$produto = new Produtos();
					$produto->setId_Produto($row->id_produto);
					$produto->setNome($row->nome);
					$produto->setFabricante($row->fabricante);
					$result [] = $produto;
				}
				$con = null;
			}catch(PDOException $e) {
				$result["err"] = "Erro de conexao com BD";
			}
			return $result;
		}


		function update() {
			$result = array();

			try {
				$query = "UPDATE table_name SET column1 = value1, column2 = value2 WHERE condition";

				$con = new Connection();

				$status = Connection::getInstance()->prepare($query);

				if($status->execute()){
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function delete() {
			$result = array();

			try {
				$query = "DELETE FROM table_name WHERE condition";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}
	}
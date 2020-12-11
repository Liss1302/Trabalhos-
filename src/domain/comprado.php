<?php

	class Comprado {
		var $id_Produto;
		var $number_compra;
		var $quantidadeComprada;
		var $valorComprado;

		function getId_Produto(){
			return $this->id_Produto;
		}
		function setId_Produto($id_Produto){
			$this->id_Produto = $id_Produto;
		}

		function getNumber_compra(){
			return $this->number_compra;
		}
		function setNumber_compra($number_compra){
			$this->number_compra = $number_compra;
		}

		function getQuantidadeComprada(){
			return $this->quantidadeComprada;
		}
		function setQuantidadeComprada($quantidadeComprada){
			$this->quantidadeComprada = $quantidadeComprada;
		}

		function getValorComprado(){
			return $this->valorComprado;
		}
		function setValorComprado($valorComprado){
			$this->valorComprado = $valorComprado;
		}
	}

	class CompradoDAO {
		function create($comprado) {
			$result = array();

			try {
				$query = "INSERT INTO table_name (column1, column2) VALUES (value1, value2)";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function read() {
			$result = array();

			try {
				$query = "SELECT column1, column2 FROM table_name WHERE condition";

				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
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

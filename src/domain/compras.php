<?php

	class Compras {
		var $number_compra;
		var $localComprado;
		var $dataCompra;

		function getNumber_compra(){
			return $this->number_compra;
		}
		function setNumber_compra($number_compra){
			$this->number_compra = $number_compra;
		}

		function getLocalComprado(){
			return $this->localComprado;
		}
		function setLocalComprado($localComprado){
			$this->localComprado = $localComprado;
		}

		function getDataCompra(){
			return $this->dataCompra;
		}
		function setDataCompra($dataCompra){
			$this->dataCompra = $dataCompra;
		}
	}

	class ComprasDAO {
		function create($compras) {
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

<?php

	class Vendas {
		var $number_venda;
		var $nomeComprador;
		var $dataVenda;

		function getNumber_venda(){
			return $this->number_venda;
		}
		function setNumber_venda($number_venda){
			$this->number_venda = $number_venda;
		}

		function getNomeComprador(){
			return $this->nomeComprador;
		}
		function setNomeComprador($nomeComprador){
			$this->nomeComprador = $nomeComprador;
		}

		function getDataVenda(){
			return $this->dataVenda;
		}
		function setDataVenda($dataVenda){
			$this->dataVenda = $dataVenda;
		}
	}

	class VendasDAO {
		function create($vendas) {
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

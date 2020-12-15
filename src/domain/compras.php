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
		function create($Compras) {
			$result = array();

			try {
				$con = new Connection();
				$query = "INSERT INTO Compras VALUES (default,'".$Compras->getlocalComprado()."','".$Compras->getDataCompra()."')";
				if(Connection::getInstance()->exec($query) >= 1){
					$result["mensagem"] = "Compra criada com sucesso!";
				}else{
					$result["erro"] = "Erro ao cadastrar compra";
				}
			}catch(PDOException $e) {
				$result["erro"] = "Erro de conexao com BD";
			}
			return $result;
		}

		function readAll() {
			$result = array();
			$query = "SELECT * FROM compras";

			try {
				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
					$compra = new Compras();
					$compra->setNumber_compra($row->number_compra);
					$compra->setlocalComprado($row->localcomprado);
					$compra->setDataCompra($row->datacompra);
					$result[] = $compra;
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = "Erro de conexao com BD";
			}

			return $result;
		}

		function read($Number_compra) {
			$result = array();
			$query = "SELECT * FROM compras WHERE number_compra = $Number_compra";


			try {
				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
					$compra = new Compras();
					$compra->setNumber_compra($row->number_compra);
					$compra->setLocalComprado($row->localcomprado);
					$compra->setDataCompra($row->datacompra);
					$result[] = $compra;
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = "Erro de conexao com BD";
			}

			return $result;
		}

		function update($comp) {
			$result = array();
			$number_compra = $comp->getNumber_compra();
			$localComprado = $comp->getlocalComprado();
			$dataCompra = $comp->getDataCompra();

			try {
				$query = "UPDATE Compras SET localcomprado = '$localComprado', datacompra = '$datahora' WHERE number_compra=$Number_compra";

				$con = new Connection();

				$status = Connection::getInstance()->prepare($query);

				if($status->execute()){
					$result = $comp;
				}else{
					$result["erro"] = "Erro ao atualizar essa compra";
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function delete($Number_compra) {
			$result = array();

			try {
				$query = "DELETE FROM Compras WHERE number_compra = $Number_compra";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
					$result["msg"] = "Compra deletada com sucesso";
				}else{
					$result["erro"] = "Erro ao excluir esse produto";
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}
	}

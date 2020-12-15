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
				$con = new Connection();
				$query = "INSERT INTO vendas VALUES (default, '".$number_venda->getNumber_compra()."','".$nomeComprador->getNomeComprador()."','".$dataVenda->getDataVenda()."')";
				if(Connection::getInstance()->exec($query) >= 1){
					$result["mensagem"] = "Venda criada com sucesso";
				}else{
					$result["erro"] = "Erro ao cadastrar venda";
				}
			}catch(PDOException $e) {
				$result["erro"] = "Erro de conexao com BD";
			}
			return $result;
		}

		function readAll() {
			$result = array();
			$query = "SELECT * FROM vendas";

			try {
				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
					$venda = new Vendas();
					$venda->setNumber_venda($row->number_venda);
					$venda->setNomeComprador($row->nomecomprador);
					$venda->setDataVenda($row->datavenda);
					$result [] = $venda;
				}
				$con = null;
			}catch(PDOException $e) {
				$result["err"] = "Erro de conexao com BD";
			}
			return $result;
		}

		function read($number_venda) {
			$result = array();

			try {
				$query = "SELECT * FROM vendas WHERE number_vendas = $number_venda";
				$con = new Connection();

				$resultSet = Connection::getInstance()->query($query);

				while($row = $resultSet->fetchObject()){
					$venda = new Vendas();
					$venda->setNumber_venda($row->number_venda);
					$venda->setNomeComprador($row->nomecomprador);
					$venda->setDataVenda($row->datavenda);
					$result [] = $venda;
				}
				$con = null;
			}catch(PDOException $e) {
				$result["err"] = "Erro de conexao com BD";
			}
			return $result;
		}

		function update($vend) {
			$result = array();
			$number_venda = $vend->getNumber_compra();
			$nomeComprador = $vend->getNomeComprador();
			$dataVenda = $vend->getDataVenda();

			try {
				$query = "UPDATE Vendas SET nomecomprador = '$nomeComprador', datavenda = '$dataVenda' WHERE number_vendas=$number_venda";

				$con = new Connection();

				$status = Connection::getInstance()->prepare($query);

				if($status->execute()){
					$result = $vend;
				}else{
					$result["erro"] = "Erro ao atualizar essa vendas";
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
				$query = "DELETE FROM Vendas WHERE number_venda= $number_venda";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
					$result["msg"] = "Venda deletada com sucesso";
				}else{
					$result["erro"] = "Erro ao excluir essa venda";
				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}
	}

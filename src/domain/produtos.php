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

			try {
				$con = new Connection();
				$query = "INSERT INTO Produtos VALUES (default,'".$Produtos->getNome()."','".$Produtos->getFabricante()."')";
				if(Connection::getInstance()->exec($query)>= 1){
					$result["mensagem"] = "Produto criado com sucesso!";
				}else{
					$result["erro"] = "Erro ao cadastrar produto";
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


		function update($prod) {
			$result = array();
			$id_produto = $prod->getId_Produto();
			$nome = $prod->getNome();
			$fabricante = $prod->getFabricante();

			try {
				$query = "UPDATE Produtos SET nome = '$nome', fabricante = '$fabricante' WHERE id_Produto=$id_produto";

				$con = new Connection();

				$status = Connection::getInstance()->prepare($query);

				if($status->execute()){
					$result = $prod;
				}else{
					$result["err"] = "Erro ao atualizar esse produto";

				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}

		function delete($id_Produto) {
			$result = array();

			try {
				$query = "DELETE FROM Produtos WHERE id_Produto = $id_Produto";

				$con = new Connection();

				if(Connection::getInstance()->exec($query) >= 1){
					$result["msg"] = "Produto deletado com sucesso";
				}else{
					$result["err"] = "Erro ao excluir esse produto";

				}

				$con = null;
			}catch(PDOException $e) {
				$result["err"] = $e->getMessage();
			}

			return $result;
		}
	}
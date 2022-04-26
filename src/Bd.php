<?php
	class Bd {
		private $conexao;
		private $dashboard;

		public function __construct(Conexao $conexao, Dashboard $dashboard) {
			$this->conexao = $conexao->conectar();
			$this->dashboard = $dashboard;
		}

		public function getNumeroVendas() {
			$query = '
				SELECT count(*) AS numero_vendas 
				FROM tb_vendas
				WHERE data_venda BETWEEN :data_inicio AND :data_fim;
			';

			$pdoStatement = $this->conexao->prepare($query);
			$pdoStatement->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$pdoStatement->bindValue(':data_fim', $this->dashboard->__get('data_fim'));

			$pdoStatement->execute();

			return $pdoStatement->fetch(PDO::FETCH_OBJ)->numero_vendas;
		}
		
		public function getTotalVendas() {
			$query = '
				SELECT SUM(total) AS total_vendas 
				FROM tb_vendas 
				WHERE data_venda BETWEEN :data_inicio AND :data_fim;
			';
			
			$pdoStatement = $this->conexao->prepare($query);
			$pdoStatement->bindValue(':data_inicio', $this->dashboard->__get('data_inicio'));
			$pdoStatement->bindValue(':data_fim', $this->dashboard->__get('data_fim'));
			
			$pdoStatement->execute();

			return $pdoStatement->fetch(PDO::FETCH_OBJ)->total_vendas;
		}
	}
?>
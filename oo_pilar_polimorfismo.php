<?php 

	class Carro extends Veiculo{
		public $teto_solar = true;

		function __construct($placa, $cor) {
			$this->placa = $placa;
			$this->cor = $cor;
		}

		function abrirTetoSolar() {
			echo "abrir teto solar";
		}

		function alterarPosicaoVolante() {
			echo "alterar posicao volante";
		}
	}

	class Moto extends Veiculo{
		public $contraPesoGuidao = true;

		function __construct($placa, $cor) {
			$this->placa = $placa;
			$this->cor = $cor;
		}

		function empinar() {
			echo "empinar";
		}

		//sobrepondo o método herdado de veículo
		function trocarMarcha() {
			echo "Desengatar marcha com a mão e engatar marcha com o pé";
		}
	}

	class Veiculo {
		public $placa = null;
		public $cor = null;

		function acelerar() {
			echo "acelerar";
		}

		function freiar() {
			echo "freiar";
		}

		function trocarMarcha() {
			echo "Desengatar marcha com o pé e engatar marcha com a mão";
		}
	}

	class Caminhao extends Veiculo {
		
	}

	$carro = new Carro('ABC1234', 'Branca');
	$moto = new Moto('DEF1122', 'Preta');
	$caminhao = new Caminhao();

	$carro->trocarMarcha();
	echo '<br>';
	$moto->trocarMarcha();
	echo '<br>';
	$caminhao->trocarMarcha();

 ?>
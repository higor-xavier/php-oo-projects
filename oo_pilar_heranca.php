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
	}

	class Veiculo{
		public $placa = null;
		public $cor = null;

		function acelerar() {
			echo "acelerar";
		}

		function freiar() {
			echo "freiar";
		}
	}

	$carro = new Carro('ABC1234', 'Branca');
	$moto = new Moto('DEF1122', 'Preta');

	echo '<pre>';
	print_r($carro);
	echo '</pre>';

	echo '<pre>';
	print_r($moto);
	echo '</pre>';

	echo "<hr>";

	$carro->abrirTetoSolar();
	echo "<br>";
	$carro->acelerar();
	echo "<br>";
	$carro->freiar();


	echo "<br>";
	$moto->acelerar();
	echo "<br>";
	$moto->freiar();

 ?>
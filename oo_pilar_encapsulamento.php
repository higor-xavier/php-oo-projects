<?php 

	class Pai {
		private $nome = 'Jorge';
		protected $sobrenome = 'Silva';
		public $humor = 'Feliz';

		/*public function getSobrenome(){
			return $this->sobrenome;
		}

		public function setSobrenome($value)
		{
			if (strlen($value) >= 3) {
				$this->sobrenome = $value;
			}
		}*/

		//os métodos mágicos permitem usar os atributos private como se fossem public
		//desde que eles sejam implementados no escopo do objeto
		public function __get($attr)
		{
			return $this->$attr;
		}

		public function __set($attr, $value)
		{
			$this->$attr = $value;
		}

		private function executarMania()
		{
			echo "Assobiar";
		}

		protected function responder()
		{
			echo "Oi";
		}

		public function executarAcao()
		{
			$x = rand(1, 10);

			if ($x >= 1 && $x <= 8) {

				$this->executarMania();
			}
			else{

				$this->responder();
			}
		}

	}

	$pai = new Pai();
	$pai->executarAcao();

	echo "<br>";
	echo $pai->sobrenome;

	/*echo "<br>";
	$pai->sobrenome = 'Xavier';
	echo $pai->sobrenome;*/

	/*$pai->setSobrenome('Xavier');
	echo "<br>";	
	echo $pai->getSobrenome();*/


	/*echo "<br>";
	$pai->humor = 'Triste';
	echo $pai->humor;*/

 ?>
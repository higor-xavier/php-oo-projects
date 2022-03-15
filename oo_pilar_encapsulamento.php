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

	class Filho extends Pai{

		public function __construct() {
			//exibir os métodos do objeto
			echo "<pre>";
				print_r(get_class_methods($this));	
			echo "</pre>";
		}

		private function executarMania()
		{
			echo "Roer unha";
		}

		public function x() {
			$this->executarMania();
		}

		//O método protected pode ser sobrescrito
		protected function responder()
		{
			echo "Olá";
		}
	}

	$filho = new Filho();

	echo "<pre>";
		print_r($filho);
	echo "</pre>";

	$filho->executarAcao();
	echo "<br>";
	$filho->x();

	/*echo $filho->__get('nome'); //esse método tem a inteligência de referenciar ao valor na classe onde foi implementado
	$filho->__set('nome', 'Carlos');
	echo "<br>";
	echo $filho->__get('nome'); 

	echo "<pre>";
		print_r($filho);
	echo "</pre>";*/

	/*echo $filho->getAtributo('nome');
	$filho->setAtributo('nome', 'Pereira');

	echo "<pre>";
		print_r($filho);
	echo "</pre>";

	echo "<br>";
	echo $filho->getAtributo('nome');*/

	/*$pai = new Pai();
	$pai->executarAcao();

	echo "<br>";
	echo $pai->sobrenome;*/

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
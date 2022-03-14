<?php 

	class Pessoa {

		public $nome = null;

		function __construct($nome) {
			$this->nome = $nome;
			echo 'Objeto iniciado';
		}

		function __destruct(){
			echo 'Objeto destruído';
		}

		function __get($atributo){
			return $this->$atributo;
		}

		function correr(){
			return $this->__get('nome') . ' está correndo';
		}
		
	}

	$pessoa = new Pessoa('Jorge');
	echo '<br>Nome: ' . $pessoa->__get('nome') . '<br>';
	echo $pessoa->correr();

	echo "<br>";

	//unset($pessoa); //proposital

 ?>
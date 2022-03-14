<?php 

	//modelo
	class Funcionario {
		
		//atributos
		public $nome = null;
		public $telefone = null;
		public $numFilhos = null;
		public $cargo = null;
		public $salario = null;

		//getters e setters overloading/sobrecarregar
		function __set($atributo, $valor){
			$this->$atributo = $valor;
		}

		function __get($atributo){
			return $this->$atributo;
		}

		//getters e setters
		/*function setNome($nome) {
			$this->nome = $nome;
		}

		function setNumFilhos($numFilhos) {
			$this->numFilhos = $numFilhos;
		}

		function setTelefone($telefone) {
			$this->telefone = $telefone;
		}

		function getNome() {
			return $this->nome;
		}

		function getNumFilhos() {
			return $this->numFilhos;
		}

		function getTelefone() {
			return $this->telefone;
		}*/

		//metodos
		function resumirCadFunc() {
			$string = $this->__get('nome') .' possui ' . $this->__get('numFilhos') . ' filho(s), cujo cargo é ' . $this->__get('cargo') . ' recebendo R$ ' . $this->__get('salario') . ',00. Contato: ' . $this->__get('telefone');
			return $string;	
		}

		function modificarNumFilhos($numFilhos) {
			//afetar um atributo do objeto	
			$this->numFilhos = $numFilhos;
		}

	}

	$func1 = new Funcionario();
	$func1->__set('nome', 'José');
	$func1->__set('numFilhos', 2);
	$func1->__set('telefone', '11 88888-9999');
	$func1->__set('cargo', 'Data Scientist');
	$func1->__set('salario', 15000);

	echo $func1->resumirCadFunc();

	//echo $func1->__get('nome') .' possui ' . $func1->__get('numFilhos') . ' filho(s), cujo cargo é ' . $func1->__get('cargo') . ' recebendo R$ ' . $func1->__get('salario') . ',00. Contato: ' . $func1->__get('telefone');
	echo "<br>";

	$func2 = new Funcionario();
	$func2->__set('nome', 'Maria');
	$func2->__set('numFilhos', 0);
	$func2->__set('telefone', '11 88899-9999');
	$func2->__set('cargo', 'Front-end Dev');
	$func2->__set('salario', 35000);

	echo $func2->resumirCadFunc();

	//echo $func2->__get('nome') .' possui ' . $func2->__get('numFilhos') . ' filho(s), cujo cargo é ' . $func2->__get('cargo') . ' recebendo R$ ' . $func2->__get('salario') . ',00. Contato: ' . $func2->__get('telefone');

 ?>
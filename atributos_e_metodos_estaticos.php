<?php 

	class Exemplo{
		public static $atributo1 = 'Eu sou um atributo estático';
		public $atributo2 = 'Eu sou um atributo normal';

		public static function metodo1(){
			//Não se pode usar $this em métodos estáticos
			//echo $this->atributo2; //ERRO: o attr2 só existirá dps da instância da classe
			echo "Eu sou um método estático";
		}

		public function metodo2(){
			echo "Eu sou um método normal";
		}

	}

	//Pode ser instanciado
	//$x = new Exemplo();
	//$x->$atributo1; //mas não pode ter seus atributos estáticos acessados
	/*echo Exemplo::$atributo1;
	echo '<br>';
	echo Exemplo::metodo1()*/;

	echo Exemplo::metodo1();

 ?>
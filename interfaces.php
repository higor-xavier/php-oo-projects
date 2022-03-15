<?php 

	interface EquipamentoEletronicoInterface{
		public function ligar();
		public function desligar();
	}

	class Geladeira implements EquipamentoEletronicoInterface {
		public function abrirPorta(){
			echo "Abrir a porta";
		}

		public function ligar(){
			echo "Ligar";
		}

		public function desligar(){
			echo "Desligar";
		}
	}

	class Tv implements EquipamentoEletronicoInterface {
		public function trocarCanal(){
			echo "Trocar canal";
		}

		public function ligar(){
			echo "Ligar";
		}

		public function desligar(){
			echo "Desligar";
		}
	}

	$x = new Geladeira();
	$y = new Tv();

	//------------------------------------------------------------

	interface MamiferoInterface{
		public function respirar();
	}

	interface TerrestreInterface{
		public function andar();
	}

	interface AquaticoInterface{
		public function nadar();
	}

	class Humano implements MamiferoInterface, TerrestreInterface{
		public function conversar(){
			echo "Conversou";
		}

		public function respirar(){
			echo "Respirou";
		}

		public function andar(){
			echo "Andou";
		}
	}

	class Baleia implements MamiferoInterface, AquaticoInterface{
		public function esguichar(){
			echo "Esguichou";
		}

		public function respirar(){
			echo "Respirou";
		}

		public function nadar(){
			echo "Nadou";
		}
	}	

	//------------------------------------------------------------

	interface AnimalInterface{
		public function comer();
	}

	interface AveInterface extends AnimalInterface{
		public function voar();
	}

	class Papagaio implements AveInterface{
		public function voar(){
			echo "Voou";
		}

		public function comer(){
			echo "Comeu";
		}
	}

 ?>
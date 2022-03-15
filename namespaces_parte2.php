<?php 

	require("./bibliotecas/lib1/lib1.php");
	require("./bibliotecas/lib2/lib2.php");

	//Fantástico!
	use A\Cliente as C1; //Pegando a classe Cliente implementada no contexto do namespace B
	//Aliasing (alias)
	use B\Cliente as C2; //Usando 'as' para definir um apelido para classes que tem o mesmo nome

	$c = new C1();
	print_r($c);
	echo $c->__get('nome');

	$c2 = new C2();
	print_r($c2);
	echo $c2->__get('nome');

 ?>
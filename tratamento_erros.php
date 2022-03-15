<?php 

	try {

		echo "<h3> *** Try *** </h3>";
		//$sql = "SELECT * FROM clientes";
		//mysql_query($sql); //ERRO: pois não há DB conectado

		if (!file_exists('require_arquivo_a.php')) {
			throw new Exception('O arquivo em questão deveria estar disponível as '. date('d/m/Y H:i:s') . ' , mas não estava');
		}
		
	} catch (Error $e) {

		echo "<h3> *** Catch Error *** </h3>";
		echo "<p style= 'color: red'>" . $e . "</p>";
		//Armazenar o erro em um BD é uma ótima ideia
		
	} catch (Exception $e) {

		echo "<h3> *** Catch Exception *** </h3>";
		echo "<p style= 'color: red'>" . $e . "</p>";

	} finally { //não é obrigatório, caso o catch seja implementado

		echo "<h3> *** Finally *** </h3>";
	}

 ?>
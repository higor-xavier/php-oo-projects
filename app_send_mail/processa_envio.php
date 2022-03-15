<?php 

	session_start();

	//Incluindo o PHPMailer: 
	//Biblioteca necessária para envio e recebimento de e-mails
	require('./bibliotecas/PHPMailer/Exception.php');
	require('./bibliotecas/PHPMailer/OAuth.php');
	require('./bibliotecas/PHPMailer/PHPMailer.php');
	require('./bibliotecas/PHPMailer/POP3.php');
	require('./bibliotecas/PHPMailer/SMTP.php');

	//Incluindo os namespaces que serão necessários
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	class Mensagem{

		private $para = null;
		private $assunto = null;
		private $mensagem = null;
		public $status = ['codigo_status' => null, 'descricao_status' => ''];

		public function __set($attr, $value){
			$this->$attr = $value;
		}

		public function __get($attr){
			return $this->$attr;
		}

		public function mensagemValida(){
			if (empty($this->para) || empty($this->assunto) || empty($this->mensagem)) {
				return false;
			}

			return true;
		}
	}

	//Instanciando nova mensagem
	$mensagem = new Mensagem();

	//Atribuindo valores vindos da interface
	$mensagem->__set('para', $_POST['para']);
	$mensagem->__set('assunto', $_POST['assunto']);
	$mensagem->__set('mensagem', $_POST['mensagem']);

	//Verificando se os dados vindos da interface são válidos
	if (!$mensagem->mensagemValida()) {
		echo 'A mensagem não é válida';
		header('Location: index.php');
	}

	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = false;								//Enable verbose debug output
	    $mail->isSMTP();									//Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';				//Set the SMTP server to send through
	    $mail->SMTPAuth   = true;							//Enable SMTP authentication
	    $mail->Username   = 'projetoesof@gmail.com';		//SMTP username
	    $mail->Password   = 'projetoesof123';				//SMTP password
	    $mail->SMTPSecure = 'tls';            				//Enable implicit TLS encryption
	    $mail->Port       = 587;							//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

	    //Recipients
	    $mail->setFrom('projetoesof@gmail.com', 'Projeto ESOF Rementente');
	    $mail->addAddress($mensagem->__get('para'));     //Add a recipient
	    //$mail->addReplyTo('info@example.com', 'Information');
	    //$mail->addCC('cc@example.com');
	    //$mail->addBCC('bcc@example.com');

	    //Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

	    //Content
	    $mail->isHTML(true);                                  //Set email format to HTML
	    $mail->Subject = $mensagem->__get('assunto');
	    $mail->Body    = $mensagem->__get('mensagem');
	    $mail->AltBody = 'É necessário utilizar um client que suporte HTML para ter acesso total ao conteúdo dessa mensagem.';

	    $mail->send();
	    $mensagem->status['codigo_status'] = 1;
	    $mensagem->status['descricao_status'] = 'E-mail enviado com sucesso.';

	} catch (Exception $e) {

		$mensagem->status['codigo_status'] = 2;
	    $mensagem->status['descricao_status'] = 'Não foi possível enviar esse e-mail! Por favor, tente novamente mais tarde. Detalhes do erro: '.$mail->ErrorInfo;
	    //alguma lógica que armazene o erro para posterior reparação por parte do programador
	}

 ?>

 <!DOCTYPE html>
 <html>
	 <head>
	 	<meta charset="utf-8">
	 	<meta name="viewport" content="width=device-width, initial-scale=1">

	 	<title>App Mail Send</title>
    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	 </head>
	 <body>

	 	<div class="container">
	 		
	 		<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

			<div class="row">

				<div class="col-md-12">
					
					<?php 
						if ($mensagem->status['codigo_status'] == 1) {
					?>
						<!-- Mensagem de sucesso -->
						<div class="container">
							<h1 class="display-4 text-success">Sucesso!</h1>
							<p><?= $mensagem->status['descricao_status']; ?></p>
							<a href="index.php" class="btn btn-success btn-lg mt-5 text-light">Voltar</a>
						</div>
					<?php 
					 	}
					?>

					<?php 
						if ($mensagem->status['codigo_status'] == 2) {
					?>
						<!-- Mensagem de erro -->
						<div class="container">
							<h1 class="display-4 text-danger">Ops!</h1>
							<p><?= $mensagem->status['descricao_status']; ?></p>
							<a href="index.php" class="btn btn-danger btn-lg mt-5 text-light">Voltar</a>
						</div>
					<?php 
					 	}
					?>

				</div>
				
			</div>

	 	</div>
	 
	 </body>
 </html>
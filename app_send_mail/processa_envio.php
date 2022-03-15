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
		die();
	}

	$mail = new PHPMailer(true);

	try {
	    //Server settings
	    $mail->SMTPDebug = 2;								//Enable verbose debug output
	    $mail->isSMTP();									//Send using SMTP
	    $mail->Host       = 'smtp.gmail.com';				//Set the SMTP server to send through
	    $mail->SMTPAuth   = true;							//Enable SMTP authentication
	    $mail->Username   = 'projetoesof@gmail.com';		//SMTP username
	    $mail->Password   = 'projetoesof123';				//SMTP password
	    $mail->SMTPSecure = 'tls';            				//Enable implicit TLS encryption
	    $mail->Port       = 587;							//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

	    //Recipients
	    $mail->setFrom('projetoesof@gmail.com', 'Projeto ESOF Rementente');
	    $mail->addAddress('higorsxavier@gmail.com', 'Projeto ESOF');     //Add a recipient
	    //$mail->addReplyTo('info@example.com', 'Information');
	    //$mail->addCC('cc@example.com');
	    //$mail->addBCC('bcc@example.com');

	    //Attachments
	    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
	    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

	    //Content
	    $mail->isHTML(true);                                  //Set email format to HTML
	    $mail->Subject = 'Teste da minha aplicação';
	    $mail->Body    = 'Este é o primeiro <strong>e-mail</strong> que mando com uma aplicação que eu mesmo fiz.';
	    $mail->AltBody = 'Oi, eu sou o conteúdo do e-mail.';

	    $mail->send();
	    echo 'Message has been sent';

	} catch (Exception $e) {
	    echo 'Não foi possível enviar esse e-mail! Por favor, tente novamente mais tarde.';
	    echo 'Detalhes do erro: ' . $mail->ErrorInfo;
	}

 ?>
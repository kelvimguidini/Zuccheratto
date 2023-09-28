<?php

define( "RECIPIENT_NAME", "Kelvim" );
define( "RECIPIENT_EMAIL", "kelvimguimg@gmail.com" );
define( "EMAIL_SUBJECT", "Alguem entrou em contato atravéz do seu site" );


// Read the form values

$success = false;


$senderName = isset( $_POST['name'] ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name'] ) : "";

$senderEmail = isset( $_POST['email'] ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email'] ) : "";

$tell = isset( $_POST['tell'] ) ? $_POST['tell'] : "";

$message = isset( $_POST['message'] ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message'] ) : "";

$mensagem =  "
Alguem entrou em contato atravéz do seu site

Nome: {$senderName}
Mensagem: {$message}
E-mail: {$senderEmail}
Telefone: {$tell}
";


//Send Email


$recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";

$headers = "From: " . $senderName . " <" . $senderEmail . ">";

$success = mail( $recipient, EMAIL_SUBJECT, $mensagem, $headers );

// Exibe uma mensagem de resultado
if ($success) {
     echo "Success";
} else {
     echo "error ao enviar e-mail";
}
?>
<?php 
$senderName		= $_POST['senderName'];
$senderEmail	= $_POST['senderEmail'];
$senderPhone	= $_POST['senderPhone'];
$senderMessage	= mysql_escape_string($_POST['senderMessage']);

$siteName		= "ingeniocontenido.co";
$to 			= "daniel.quinones@ingeniocontenido.co";

$headers  		= "MIME-Version: 1.0\r\n"; 
$headers 		.= "Content-type: text/html; charset=iso-8859-1\r\n";

$headers 		.= "From: " . $siteName ." \n";
$headers 		.= "Reply-To: " . $senderEmail . "\n\n";



$toSubject 		= "Mensaje de $senderName via $siteName";
$emailBody 		= "<strong>De</strong>: $senderName <br />
				<strong>Email</strong>: $senderEmail <br /> 
				<strong>Telefono</strong>: $senderPhone <br /> <br />
				<strong>Mensaje</strong>: <br /><br />
				". nl2br($senderMessage);  
$message 		= $emailBody;

$okMsg = "";
if( $to != "daniel.quinones@ingeniocontenido.co" )
{
    $ok 		= mail($to, $toSubject, $message, $headers);
}
else{
    $ok         = false;
    $okMsg      = "Please change the '" . $to . "' to your own email address!"; 
}
    
if($ok){
	$okMsg = "";
}
else{
	if( $okMsg != "" )$okMsg = "INTENTELO NUEVAMENTE";	
}

$result 	= array(  
                        'result' => $ok, 
                        'msg' => $okMsg);

echo json_encode($result);
?>

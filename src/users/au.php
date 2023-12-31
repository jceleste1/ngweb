<?php


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: *");
header('Content-Type: application/json; charset=UTF-8');  



include("../rds.conf.php");
include("../database.php");

include("./classUser.php");
 

$data = json_decode(file_get_contents("php://input") );
  

$token = "####"; $idU = "";
foreach (getallheaders() as $name => $value) {	
	if(  strtoupper( $name ) == "XTOKEN")
       $token =  $value;
    if( strtoupper(   $name ) == "IDUSER")
       $idU =  $value;

 $alerta .= " - NAME  $name -  VALOR  $value";   
}
$classUser = new classUser( $data, $_SERVER["REQUEST_METHOD"], $_REQUEST );

echo  $classUser->getMyAnnouncement($idU, $token );





include("../commons/classCommons.php");
$classCommons = new classCommons();
$aSector = $classCommons->aSector();
$aTypecompany  = $classCommons->aTypecompany();
include('../PHPMailer51/class.phpmailer.php');



$Email = new PHPMailer();

$Email->IsHTML(true); 
$Email->Host =     "email-smtp.us-east-1.amazonaws.com";
$Email->isSMTP();

$Email->SMTPDebug = 0;
$Email->Hostname =     "email-smtp.us-east-1.amazonaws.com";   
$Email->Port = 587;

$Email->SMTPAuth   = true;
$Email->SMTPSecure =  "tls";

$Email->Username   = "AKIAQBGMQYEXEFKMZGAE";
$Email->Password   = "BPtDm+U0bPE+BQDa88HojniKst94FrFsHxhUveMz+16E"; 

// na classe, h? op? de idioma, setei como br14.
$Email->SetLanguage("br");

$Email->From = "contato@negocioslucrativos.com.br";
$Email->CharSet           = 'UTF-8';
$Email->Mailer            = 'mail';
// nome do remetente do email
$Email->FromName = 'NegociosLucrativos';
$Email->Sender = "contato@negocioslucrativos.com.br";

// Endere?de destino do emaail, ou seja, pra onde voc?uer que a mensagem do formul?o v?

$Email->AddAddress("jceleste1@gmail.com" );

$Email->Body .=   eregi_replace("[\]",'',$alerta );

$Email->Send();









?>
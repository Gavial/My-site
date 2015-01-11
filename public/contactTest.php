<?php

include('header.php');

$destinataire = 'odile_jacqmin@hotmail.com';
$form_action = '';
$message_envoye = "Votre message a bien été envoyé!";
$message_non_envoye = "L'envoi de votre message a échoué, veuillez réessayer SVP";
$message_formulaire_invalide = "Vérifiez que tous les champs soient remplis et que votre adresse mail ne comporte pas d'erreur";
function Rec($text)
{
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	if (1 === get_magic_quotes_gpc())
	{
		$text = stripslashes($text);
	}
 
	$text = nl2br($text);
	return $text;
};
function IsEmail($email)
{
	$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
	return (($value === 0) || ($value === false)) ? false : true;
}
$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
$email = (IsEmail($email)) ? $email : '';
$err_formulaire = false;

if (isset($_POST['envoi']))
{
	if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
	{
		$headers  = 'From:'.$nom.' <'.$email.'>' . "\r\n";
		$headers .= 'Reply-To: '.$email. "\r\n" ;
		$headers .= 'X-Mailer:PHP/'.phpversion();
 
		if ($copie == 'oui')
		{
			$cible = $destinataire.','.$email;
		}
		else
		{
			$cible = $destinataire;
		};
 
		$message = str_replace("&#039;","'",$message);
		$message = str_replace("&#8217;","'",$message);
		$message = str_replace("&quot;",'"',$message);
		$message = str_replace('&lt;br&gt;','',$message);
		$message = str_replace('&lt;br /&gt;','',$message);
		$message = str_replace("&lt;","&lt;",$message);
		$message = str_replace("&gt;","&gt;",$message);
		$message = str_replace("&amp;","&",$message);
 
		if (mail($cible, $objet, $message, $headers))
		{
			echo '<p>'.$message_envoye.'</p>';
		}
		else
		{
			echo '<p>'.$message_non_envoye.'</p>';
		};
	}
	else
	{
		echo '<p>'.$message_formulaire_invalide.'</p>';
		$err_formulaire = true;
	};
};
 
if (($err_formulaire) || (!isset($_POST['envoi'])))
{
	echo '

	<div class="container theme-showcase" role="main">
        <div class="panel panel-default">
            <div class="panel-heading">
        
                <h2 class="text-center">Vous pouvez me contacter</h2>
             </div>
        </div> 


	<form class="form-horizontal" role="form" id="contact" method="post" action="'.$form_action.'"> 
	<fieldset>
		<div class="form-group">
            <label for="nom" class="col-sm-2 control-label">Nom & Prénom</label '.stripslashes($nom).'" tabindex="1" />
                <div class="col-sm-10">
                    <textarea class="form-control" rows="1"></textarea>
                </div>
		</div>

		<div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Votre e-mail</label>
           	<div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3" placeholder="votre@adresse.mail"'.stripslashes($email).'" tabindex="2" />
            </div>
        </div>

		<div class="form-group">
            <label for="objet" class="col-sm-2 control-label">Objet</label '.stripslashes($objet).'" tabindex="3" />
           	<div class="col-sm-10">
                <textarea class="form-control" rows="1"></textarea>
            </div>
         </div>
			
		<div class="form-group">
            <label for="message" class="col-sm-2 control-label">Message</label '.stripslashes($message).'</textarea>
           	<div class="col-sm-10">
                <textarea class="form-control" rows="10"></textarea>
            </div>
 		</div>

	</fieldset>

 		<div class="container theme-showcase" role="main">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div align="center">
                    <a class="btn btn-success btn-lg" role="button"><input type="submit" name="envoi"	
                    <p><span class="glyphicon glyphicon-envelope"></span>&nbsp&nbsp&nbspEnvoyer</a></p>
                    </div>
                </div>
            </div>

	</form>';
};
?>
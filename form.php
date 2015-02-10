<?php

        $email;$comment;$captcha;
        if(isset($_POST['email'])){
          $email=$_POST['email'];
        }if(isset($_POST['comment'])){
          $email=$_POST['comment'];
        }if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<h2>Please check the the captcha form.</h2>';
          exit;
        }
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Le-vgETAAAAAB_NDDPvzh9oPkmKYrtakvKCwP1B=".$captcha."&remoteip=".$_SERVER['REMOTE_ADDR']);
        if($response.success==false)
        {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        }else
        {
          echo '<h2>Thanks for posting comment.</h2>';
		  // L'INDIRIZZO DEL DESTINATARIO DELLA MAIL 
			$to = "info@palconudo.it"; 

			// IL SOGGETTO DELLA MAIL 
			$subject = "Modulo proveniente dal sito palconudo.it"; 

			// COSTRUIAMO IL CORPO DEL MESSAGGIO 
			$body = "Contenuto del modulo:\n\n"; 
			$body .= "email: " . trim(stripslashes($_POST["email"])) . "\n"; 
			$body .= "Note: " . trim(stripslashes($_POST["comment"])) . "\n"; 

			// INTESTAZIONI SUPPLEMENTARI 
			$headers = "From: Modulo utenti<modulo@palconudo.it>"; 

			// INVIO DELLA MAIL 
			if(@mail($to, $subject, $body, $headers)) 
			{ // SE L'INOLTRO È ANDATO A BUON FINE... 

			echo "La mail è stata inoltrata con successo."; 

			} else {// ALTRIMENTI... 

			echo "Si sono verificati dei problemi nell'invio della mail."; 

			} 
		}
?>
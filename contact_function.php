<?php
header("Access-Control-Allow-Origin: *");

function cleanPosUrl ($str) {
	return stripslashes($str);
}

function check_email_address($email) {
	return preg_match('/^[^@]+@[a-zA-Z0-9._-]+\.[a-zA-Z]+$/', $email);
}
		$name_field="name";
		$email_field="email";
		$email_subject = 'Electronic Contact from http://spaceshiplabs.com';
		$referring_page = "http://spaceshiplabs.com";
		$contact_email = 'admin@spaceshiplabs.com';
		//$contact_email = 'luis19prz@gmail.com';
		$recipient_name = '';

		$text = '';
		foreach ($_POST as $key => $value){
			$value = cleanPosUrl($value);
			if($key != 'submit'){
			if($key != 'sendContactEmail')
				$text = $text."\n".$key.": ".$value;
			}
		}
		if(isset($_POST[$email_field])){
			if(check_email_address($_POST[$email_field])){
				$to = $contact_email;
				$subject = $email_subject.': '.$_POST[$name_field];
				$subject = utf8_decode($subject);
				$headers = 'From:'.$_POST[$email_field];
				$mailit = mail($to,$subject,$text,$headers);
				if(@$mailit){
					echo "success";
				}else{
					echo "fail";
				}
			}else
				echo "invalid email";
		}else{
			echo "null email";
		}
?>

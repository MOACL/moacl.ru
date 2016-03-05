<?
	$login = $_GET['login'];
	$password1 = $_GET['password1'];
	$password2 = $_GET['password2'];
	$email = $_GET['email'];
	
	include_once 'moacl_framework.php';
	$reg = New Registration;
	$login_mes = $reg ->warningField("login", $login);
	$pass1_mes = $reg ->warningField("password1", $password1);
	$pass2_mes = $reg ->warningField("password2", $password2);
	$email_mes = $reg ->warningField("email", $email);
	$complete = "false";
	if(isset($login_mes) or isset($pass1_mes) or isset($pass2_mes) or isset($email_mes)){
		if(($login_mes == _OK) && ($pass1_mes == _OK) && ($pass2_mes == _OK) && ($email_mes==_OK)){
			$complete = "true"; //все рег.данные введены правильно.
		}
		
		$result = array(
							'login_mes'=>$login_mes,
							'pass1_mes'=>$pass1_mes,
							'pass2_mes'=>$pass2_mes,
							'email_mes'=>$email_mes,
							'complete'=>$complete
							);	
	}
	else {
		$result = array(
							'type'=>'error', 
							'complete'=>$complete
							);
	}
print json_encode($result);
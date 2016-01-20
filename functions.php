<?
include_once 'constants.php';
//registration

function registration($login, $password1, $password2,$email){//++
	$verification_data_err = verification_reg_data($login,$password1,$password2,$email);
	if($verification_data_err){
		$feedback = $verification_data_err;
	}
	else{
		$password = $password1;
		prepare_reg_data(&$login,&$password,&$email);
	
		$salt = salting();
		$hash = crypt($password, $salt);

		$feedback =user_register($login,$hash,$salt,$email);
	}
	return $feedback;
}


function verification_reg_data($login,$password1,$password2,$email) {//++

	//Login
	$feedback=login_exist($login);
	if(!$feedback === false){
		return $feedback;
	}
	if(strlen($login) > LOGIN_MAX_LEN){
		$feedback="Very long Login, Please put <=" . LOGIN_MAX_LEN . "letters.";
		return $feedback;
	}
	elseif(strlen($login)==0){
		$feedback="Login is mising! Please put <=" . LOGIN_MAX_LEN . "letters.";
		return $feedback;
	}//Login
	
	//Password
	if(strlen($password1) > PASSWORD_MAX_LEN){
		$feedback="Very long Password! Please put <=" . PASSWORD_MAX_LEN . " letters.";
		return $feedback;
	}
	elseif(strlen($password1)==0){
		$feedback="Password is mising! Please put <=" . PASSWORD_MAX_LEN . "letters.";
		return $feedback;
	}
	
	if(!($password1==$password2)){
		$feedback="Passwords do not match! Please retype the password.";
		return $feedback;
	}//Password
	
	//E-mail
	$feedback=email_exist($email);
	if(!$feedback === false){
		return $feedback;
	}
	if(!preg_match("|^[-0-9a-z_\.]+@[-0-9a-z_^\.]+\.[a-z]{2,6}$|i", $email)) { 
         $feedback="Incorrect Email!";
		return $feedback;
    } //E-mail
	
}

function salting(){//++
	$salt = '$2a$10$'.substr(str_replace('+', '.', base64_encode(pack('N4', mt_rand(), mt_rand(), mt_rand(),mt_rand()))), 0, 22) . '$';
	return $salt;
}

function user_register($login,$hash,$salt,$email) { //++
	$ip = get_ip();
	$query = "INSERT INTO `users` (`Login`, `Password`, `Salt`, `E-mail`, `Deleted`, `Commentary`, `IP_last`) VALUES ('$login' , '$hash' ,'$salt', '$email', 0,'ppp', '$ip');";
			
	$result = mysql_query($query); 
	if (!$result) { 
			$feedback = 'Error - Database Error! - '; 
			$feedback .= mysql_error(); 
			
	}
	else{
		
		//send mail for confirmation
		$result = mysql_query ("SELECT `User_ID`, `Salt` FROM `users` WHERE `Login`='$login'");
		$row = mysql_fetch_array($result);
		$activation = crypt($row['User_ID'].$login, $row['Salt']);
		$subject = "Registration confirmation.";
		$message    = "Уважаемый ".$login.", для активации акаунта на moacl.ru перейдите по ссылке:\nhttp://moacl.ru/activation.php?login=".$login."&code=".$activation;
		mail($email, $subject, $message, "Content-type:text/plane; Charset=utf-8\r\n");
                     
            $feedback = "На ".$email." отправлена cсылкa для подтверждения регистрации.<br> Внимание! Ссылка действительна 1 час."; 
	}
	return $feedback; 
}

function prepare_reg_data($login,$password,$email) { //++

	$login = trim(strtolower($login));

	$password = mysql_real_escape_string($password);

	$email = trim(strtolower($email));
}

function login_exist($login){//++
	$query = "select `User_ID` from `users` where `Deleted` = 0 and `Login` = '$login'";
	$result = mysql_query($query); 
	if (!$result) { 
		
			$feedback = 'Error - Database Error! - '; 
			$feedback .= mysql_error(); 
			
	}
	else{
		$myrow = mysql_fetch_array($result);
	
		if (!empty($myrow['User_ID'])) {
			$feedback ="Login already exist!";
		}
		else{
			$feedback = false;
		}
		return $feedback;
	}
}

function email_exist($email){//++
	$query = "select `User_ID` from `users` where `Deleted` = 0 and `E-mail` = '$email'";
	$result = mysql_query($query); 
	if (!$result) { 
		
			$feedback = 'Error - Database Error! - '; 
			$feedback .= mysql_error(); 
			
	}
	else{
		$myrow = mysql_fetch_array($result);
	
		if (!empty($myrow['User_ID'])) {
			$feedback ="E-mail already exist!";
		}
		else{
			$feedback = false;
		}
		return $feedback;
	}
}

function get_ip()//++
{
    if (!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


?>



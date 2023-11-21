<?php
include "db.php";

$email_pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$email = $_POST['id'];

	//중복확인
	$sql = "SELECT email FROM users WHERE email='$email'";
	$result = mysqli_query($mysqli, $sql);

	if(preg_match($email_pattern, $email)){

		if(mysqli_num_rows($result)){
			echo "중복된 ID입니다.<br>";
		}else{
			echo "사용 가능한 ID입니다.<br>";
			$id_confirm = true;
		}
	}
	else{
		echo "유효하지 않은 이메일 주소입니다.";
	}
}

?>
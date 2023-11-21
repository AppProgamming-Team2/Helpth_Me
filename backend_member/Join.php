<?php
include "db.php";

    //정보 전달 방식이 POST일때만 코드 실행, 오류를 어느정도 거를 수 있음
	if($_SERVER['REQUEST_METHOD'] === 'POST'){

		$password = $_POST['pw'];
	    $password_confirm = $_POST['pw_cf'];
	    $email = $_POST['id'];
	    $name = $_POST['name'];
	    
        if($password === $password_confirm){ 

        //
		$sql = "INSERT INTO users (email, password, username) VALUES
		('$email', '$password', '$name')";

		$result = mysqli_query($mysqli, $sql);

		echo "회원가입 완료 <br>";
		echo "반갑습니다,".$email." 회원님!";
        
		
		}

		else{
			echo "패스워드가 일치하지 않습니다.";
		}
	}
?>


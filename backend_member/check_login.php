<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <title></title>
</head>
<body>
   <?php
   session_start();
   include "db.php";
      
      //login.php에서 입력받은 id, password
      $email = $_POST['id'];
      $password = $_POST['pw'];
       
      //동일한 이름으로 저장된 id, password를 select함 
      $sql = "SELECT email, password FROM tb1 WHERE email='$email' AND
      password='$password'";

      //mysqli_query : 서버에 접속한 뒤($mysqli) 테이블의 값들을 모두 표현
      $result = mysqli_query($mysqli, $sql);

      //fetch_array : array 형태로 가져옴, 넘어온 결과를 한 행씩 패치해서 $row라는 배열에 담음. 함수의 인자로 들어갈 수 있는 값은 3개(NUM, ASSOC, BOTH)

      //NUM : 숫자 첨자를 통해 데이터를 호출
      //ASSOC : 연관배열의 약자, 필드명(열이름,키값)을 통해 데이터를 호출
      //BOTH : 둘다 가능
      $row = $result->fetch_array(MYSQLI_ASSOC);
      
      //결과가 존재하면 세션 생성
      if ($row != null) {
         $_SESSION['username'] = $row['email'];
         $_SESSION['name'] = $row['name'];
         echo "<script>location.replace('index.php');</script>";
         exit;
      }
      
      //결과가 존재하지 않으면 로그인 실패
      if($row == null){
         echo "<script>alert('ID 또는 비밀번호가 틀립니다')</script>";
         echo "<script>location.replace('login.php');</script>";
         exit;
      }
      ?>
   </body>
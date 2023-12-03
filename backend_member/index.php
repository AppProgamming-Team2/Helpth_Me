<?php
//세션을 확인해서 
//로그인이 되어있다면 유저의 아이디와 로그아웃 버튼을 보여주고
//로그인이 되어있지 않다면 login.php로 이동

session_start();

if(!isset($_SESSION['username'])) {
    echo "<script>location.replace('login.php');</script>";            
}

else {
    $username = $_SESSION['username'];
    $name = $_SESSION['name'];
}
 
?>
<body>
    <div class="base">
        <h2><?php echo "Hi, $username($name)";?></h2>
        <button type="button" class="btn" onclick="location.href='logout.php'">
            LOGOUT
        </button>
    </div>
</body>
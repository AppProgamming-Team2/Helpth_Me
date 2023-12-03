<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // POST로 전달된 상품 ID 가져오기
    $product_id = $_POST['product_id'];

    // 장바구니에 상품 추가
    $query = "INSERT INTO cart (product_id) VALUES ('$product_id')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "상품이 장바구니에 추가되었습니다. <a href='cart.html'>장바구니로 이동</a>";
    } else {
        echo "상품을 장바구니에 추가하지 못했습니다.";
    }
}

mysqli_close($conn);
?>

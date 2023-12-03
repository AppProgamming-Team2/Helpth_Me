<?php
  session_start();
  include "db.php";

  $title = $_POST['title'];
  $price = $_POST['price'];
  $content = $_POST['content'];
  $myTempFile = $_FILES['imgFile']['tmp_name'];

  $query = "insert into product (
    title,
    content,
    price,

  )"

  // 파일명을 기존의 파일명을 그대로 쓰고 싶은 경우
  $fileName = $_FILES['imgFile']['name'];
  // 파일 타입 및 확장자 구하기
  $fileTypeExtension = explode("/", $_FILES['imgFile']['type']);

  // 파일 타입
  $fileType = $fileTypeExtension[0];
  // 파일 확장자
  $extention = $fileTypeExtension[1];

  // 확장자 검사
  $isExtGood = false;

  switch ($extention) {
    case 'jpeg':
    case 'bmp':
    case 'gif':
    case 'png':
      $isExtGood = true;
      break;
    default:
      echo "허용하는 확장자는 jpg, bmp, gif, png 입니다. - switch";
      exit;
      break;
  }

  // 이미지 파일이 맞는지 확인
  if ($fileType  == 'image') {
    // 허용할 확장자를 jpg, bmp, gif, png로 정함, 그 외는 업로드 불가
    if ($isExtGood) {
        // 이미지를 업로드할 디렉토리
        $uploadDirectory = "uploads/";

        // 이미지 파일의 신규 이름 생성 (예: 현재 시간 기반)
        $newFileName = time() . '_' . $fileName;

        // 이미지를 업로드할 경로
        $uploadPath = $uploadDirectory . $newFileName;

        // 임시 저장된 파일을 우리가 저장할 장소 및 파일명으로 옮김
        $imageUpload = move_uploaded_file($_FILES['imgFile']['tmp_name'], $uploadPath);

        // 업로드 성공 여부 확인
        if ($imageUpload == true) {
            // 데이터베이스에 이미지 정보 추가
            $query = "INSERT INTO product (title, content, price, image_name, image_type, image_extension, image_path) 
                      VALUES ('$title', '$content', '$price', '$fileName', '$fileType', '$extension', '$uploadPath')";

            // 나머지 코드는 데이터베이스에 쿼리를 실행하고 결과를 확인하는 부분 등을 포함해야 합니다.

            echo "파일이 정상적으로 업로드 되었습니다. <br>";
            echo "<img src='{$uploadPath}' width='200' />";
        } else {
            echo "파일 업로드에 실패했습니다.";
        }
    }
    // 확장자가 jpg, bmp, gif, png가 아닐때
    else {
        echo "허용하는 확장자는 jpg, bmp, gif, png 입니다. - else";
        exit;
    }
  }
  // type이 image가 아닐때
  else {
    echo "이미지 파일이 아닙니다.";
    exit;
  }
?>
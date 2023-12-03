<<<<<<< HEAD
function clearDefaultValue(input) { 
  if (input.value === input.defaultValue) {
    input.value = "";
  }
}

var duplicate_message = '';

function id_duplication() {
/* ID 중복 확인 버튼을 클릭했을 때 실행할 코드 */
/* PHP 파일로부터 받은 응답을 처리하는 코드*/
  var email = document.getElementById("id").value;
  $.ajax({
    url: 'check_duplicate.php', // PHP 파일의 경로 
    type: 'POST',
    dataType: 'html',
    data: {id:id}, // PHP 파일로 전달할 데이터 
    success: function(response) {
      $('#duplicate_message') .html(response); // 결과를 표시할 요소에 HTML 삽입
      duplicate_message = $('#duplicate_message').text();
      receive();  
    },
    error: function() {
      alert('오류가 발생했습니다.');
    }
  });

}

function receive() { 
/* PHP 파일로부터 받은 응답을 처리하는 코드*/ 
  var password= document.getElementById("pw").value; 
  var password_confirm = document.getElementById("pw_cf").value; 
  var ID_confirm = duplicate_message;
}


function confirm_error() { 

  receive();

// 특정 조건 확인
  if (password === " "){ 
    $('#password_confirm_error').html("패스워드를 입력해주세요") 

  }

  else {


    if (password === password_confirm) { 
      $('#password_confirm_error').html ("패스워드가 일치합니다.")
      if(duplicate_message==="사용 가능한 ID입니다.") { 
        return true;
      } 
      else {
        console.log(ID_confirm); 
        $('#confirm_error').html ("ID를 다시 확인해주세요.");
        return false; }
    } 
    else {
    // 조건 미충족 시 페이지 이동 중지 
    $('#password_confirm_error').html("패스워드가 일치하지 않습니다.");
    return false;
    }

  }
}
=======
      function clearDefaultValue(input) { 
        if (input.value === input.defaultValue) {
          input.value = "";
        }
      }

      var duplicate_message = '';

      function id_duplication() {
      /* ID 중복 확인 버튼을 클릭했을 때 실행할 코드 */
      /* PHP 파일로부터 받은 응답을 처리하는 코드*/
      var id = document.getElementById("id").value;
      $.ajax({
        url: 'check_duplicate.php', // PHP 파일의 경로 
        type: 'POST',
        dataType: 'html',
        data: {id:id}, // PHP 파일로 전달할 데이터 
        success: function(response) {
          $('#duplicate_message') .html(response); // 결과를 표시할 요소에 HTML 삽입
          duplicate_message = $('#duplicate_message').text();
          receive();  
        },
        error: function() {
          alert('오류가 발생했습니다.');
        }
      });

      }

      function receive() { 
      /* PHP 파일로부터 받은 응답을 처리하는 코드*/ 
      password= document.getElementById("pw").value; 
      password_confirm = document.getElementById("pw_cf").value; 
      ID_confirm = duplicate_message;
      }


      function confirm_error() { 
      
       receive()

      // 특정 조건 확인
      if (password === "" | password_confirm === ""){ 
        $('#password_confirm_error').html("패스워드를 입력해주세요") 

        }

        else {


        if (password === password_confirm) { 
            $('#password_confirm_error').html ("패스워드가 일치합니다.")
            if(duplicate_message==="사용 가능한 ID입니다.") { 
              return true;
            } 
            else {
              console.log(ID_confirm); 
              $('#confirm_error').html ("ID를 다시 확인해주세요.");
              return false; 
            }

        } else {
          // 조건 미충족 시 페이지 이동 중지 
          $('#password_confirm_error').html("패스워드가 일치하지 않습니다.");
          return false;
        }

      }
      }
>>>>>>> 1a626d7a0067bb0aeffcbe5e7c44fa3dcc14f7c8

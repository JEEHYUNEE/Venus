<?php
// 1. 연결 : mysql_connect(호스트명, 아이디, 비밀번호, DB 선택)
//xampp서버 초기 비밀번호 없음 >  공백
$maria_connect = mysqli_connect('localhost', 'sstyler7', 'hyukfamilly1!!', 'sstyler7');
$maria_connect -> set_charset("utf8");

// 2. mq(쿼리문 작성) 시 쿼리문 실행되게 만듬
function mq($sql){
  global $maria_connect;
  return $maria_connect->query($sql);
}

if ($maria_connect == false) {
  echo "데이터베이스 연결에 실패했습니다.";
} else {
}


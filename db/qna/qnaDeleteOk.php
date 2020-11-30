<?php
include_once('../jhDbcon.php');
//각 변수에 write.php에서 input name값들을 저장한다
$num = $_GET['num'];
$sql = mq("delete from qna where qnaNum='".$num."';");
$sql = mq("delete from qna_answer where qna_num='".$num."';");
echo "<script>alert('Q&A삭제가 완료되었습니다.');location.href='../../qna_board.php';</script>";
?>
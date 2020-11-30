<?php
 include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");;
//각 변수에 write.php에서 input name값들을 저장한다
$idx = $_POST['idx'];
$num = $_POST['num'];
$sql = mq("delete from qna_answer where idx='".$idx."';");
//답변이 삭제되었음을 저장 >  answerCheck='N'
$sql = mq("update qna set answerCheck='N' where qnaNum='".$num."';"); 
echo "<script>alert('Q&A답변삭제가 완료되었습니다.');opener.parent.location.reload();window.close();</script>";
?>
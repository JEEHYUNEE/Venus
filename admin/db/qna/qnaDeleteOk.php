<?php
include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");;
//각 변수에 write.php에서 input name값들을 저장한다
$num = $_POST['num'];
$sql = mq("delete from qna where qnaNum='".$num."';");
$sql = mq("delete from qna_answer where qna_num='".$num."';");
$sort1 = mq("alter table qna AUTO_INCREMENT=1;"); 
$sort2 = mq("set @CNT = 0;"); 
$sort3 = mq("update qna SET qna.qnaNum = @CNT:=@CNT+1;"); 
echo "<script>alert('Q&A 및 답변삭제가 완료되었습니다.');opener.parent.location.reload();window.close();</script>";
?>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
//각 변수에 write.php에서 input name값들을 저장한다
$num = $_POST['num'];
$sql = mq("delete from notice where noticeNum='".$num."';");
$sort1 = mq("alter table notice AUTO_INCREMENT=1;"); 
$sort2 = mq("set @CNT = 0;"); 
$sort3 = mq("update notice SET notice.noticeNum = @CNT:=@CNT+1;"); 
echo "<script>alert('공지사항삭제가 완료되었습니다.');opener.parent.location.reload();window.close();</script>";
?>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
//각 변수에 write.php에서 input name값들을 저장한다
$num = $_POST['num'];
$sql = mq("delete from news where newsNum='".$num."';");
$sort1 = mq("alter table news AUTO_INCREMENT=1;"); 
    $sort2 = mq("set @CNT = 0;"); 
    $sort3 = mq("update news SET news.newsNum = @CNT:=@CNT+1;");
echo "<script>alert('뉴스삭제가 완료되었습니다.');opener.parent.location.reload();window.close();</script>";
?>
<?php
include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
//각 변수에 write.php에서 input name값들을 저장한다
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if($title && $content){
    $sql = mq("insert into notice(title,content,hit,date) values('".$title."','".$content."','0','".$date."')"); 
    $sort1 = mq("alter table notice AUTO_INCREMENT=1;"); 
    $sort2 = mq("set @CNT = 0;"); 
    $sort3 = mq("update notice SET notice.noticeNum = @CNT:=@CNT+1;"); 
    echo "<script>alert('공지사항등록이 완료되었습니다.');opener.parent.location.reload();window.close();</script>";
}else{
    echo "<script> alert('공지사항등록에 실패했습니다.');window.close();</script>";
}
?>
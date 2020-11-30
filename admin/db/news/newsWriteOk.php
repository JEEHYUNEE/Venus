<?php
include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
//각 변수에 write.php에서 input name값들을 저장한다
$title = $_POST['title'];
$content = $_POST['content'];
$date = date('Y-m-d');
if($title && $content){
    $sql = mq("insert into news(title,content,hit,date) values('".$title."','".$content."','0','".$date."')");
    $sort1 = mq("alter table news AUTO_INCREMENT=1;"); 
    $sort2 = mq("set @CNT = 0;"); 
    $sort3 = mq("update news SET news.newsNum = @CNT:=@CNT+1;");  
    echo "<script>alert('뉴스등록이 완료되었습니다.');opener.parent.location.reload();window.close();</script>";
}else{
    echo "<script> alert('뉴스등록에 실패했습니다.');window.close();</script>";
}
?>
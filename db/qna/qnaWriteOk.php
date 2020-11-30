<?php
	include_once('../jhDbcon.php');
	error_reporting(E_ALL); 
    //각 변수에 write.php에서 input name값들을 저장한다
    $user = $_POST['user'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');
    $filename= $_FILES["fileToUpload"]["name"];
    echo"<script>alert(".$filename.");</script>";
    $target_dir = "../../files/";
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
    }



    if($title && $content){
        $sql = mq("insert into qna(userId,title,content,hit,date,file,answerCheck) values('".$user."','".$title."','".$content."','0','".$date."','".$filename."','N')");
        $sort1 = mq("alter table qna AUTO_INCREMENT=1;"); 
        $sort2 = mq("set @CNT = 0;"); 
        $sort3 = mq("update qna SET qna.qnaNum = @CNT:=@CNT+1;");       
        echo "<script>alert('Q&A등록이 완료되었습니다.');location.href='../../qna_board.php';</script>";
    }else{
        echo "<script> alert('Q&A등록에 실패했습니다.');window.close();</script>";
    }
?>
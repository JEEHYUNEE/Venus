<?php
    include_once('../jhDbcon.php');
    if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
    {
        if(!isset($errMSG))
        {
            try{
                //각 변수에 write.php에서 input name값들을 저장한다
                $id = $_POST['id'];
                $reply = $_POST['reply'];
                $faq_num = $_POST['faq_num'];
                $date = date('Y-m-d');
                if($id&&$reply&&$faq_num){
                    if($sql = mq("insert into faq_reply(faq_num,userId,content,date) values('".$faq_num."','".$id."','".$reply."','".$date."')")){
                        echo "SUCCESS";
                    }else{
                        $errMSG = "사용자 추가 에러";
                        echo $id;
                    }
                }

            } catch(PDOException $e) {
                die("Database error: " . $e->getMessage()); 
            }
        }
    }
?>
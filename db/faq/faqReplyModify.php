<?php
    include_once('../jhDbcon.php');
    if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
    {
        if(!isset($errMSG))
        {
            try{
                //각 변수에 write.php에서 input name값들을 저장한다
                $id = $_POST['id'];
                $value = $_POST['value'];
                if($id&&$value){
                    if($sql = mq("update faq_reply set content='".$value."'where idx='".$id."';")){
                        echo "SUCCESS";
                    }else{
                        $errMSG = "사용자 추가 에러";
                    }
                }

            } catch(PDOException $e) {
                die("Database error: " . $e->getMessage()); 
            }
        }
    }
?>
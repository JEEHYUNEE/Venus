<?php
include '../dbcon.php';

if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
{
    if(!isset($errMSG))
    {
        try{

            $select_stmt = $con->prepare("SELECT profileImg FROM member WHERE memberId=:id");
            $select_stmt->bindParam(':id',$_POST['memberId']);
            $select_stmt->execute();
            $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result[0]['profileImg']!=null&&file_exists($_SERVER['DOCUMENT_ROOT'].$result[0]['profileImg']))
                unlink($_SERVER['DOCUMENT_ROOT'].$result[0]['profileImg']);

            $stmt = $con->prepare('DELETE FROM member Where memberId=:memberId');
            $stmt -> bindParam(':memberId',$_POST['memberId']);
         

            if($stmt->execute()){
                    echo "SUCCESS";
            }
            else{
                $errMSG = "사용자 추가 에러";
            }

        } catch(PDOException $e) {
            die("Database error: " . $e->getMessage()); 
        }
    }
}
?>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';

if( ($_SERVER['REQUEST_METHOD'] == 'GET'))
{
    if(!isset($errMSG))
    {
        try{

            $stmt = $con->prepare('DELETE FROM cv WHERE cvId=:id');
            $stmt -> bindParam(':id',$_GET['id']);
            if($stmt->execute()){
                   echo "<script>alert('삭제가 완료되었습니다.');</script>";
                   echo "<script>location.href='/venus/mypage-cv.php';</script>";
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
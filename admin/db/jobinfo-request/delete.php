<?php
include '../dbcon.php';

if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
{
    if(!isset($errMSG))
    {
        try{

            $stmt = $con->prepare('DELETE FROM jobinfo_request WHERE jrId=:id');
            $stmt -> bindParam(':id',$_POST['id']);
            
            if($stmt->execute()){
                    echo "SUCCESS";
                    echo "<script>alert('구인의뢰가 삭제되었습니다.');opener.parent.location.reload();window.close();</script>";
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
<?php
include '../dbcon.php';
if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
{
    if(!isset($errMSG))
    {
        try{

            $stmt = $con->prepare('UPDATE administrator set authority=:authority, workingStatus=:workingStatus Where adminId=:adminId');
            $stmt -> bindParam(':authority',$_POST['authority']);
            $stmt -> bindParam(':workingStatus',$_POST['workingStatus']);
            $stmt -> bindParam(':adminId',$_POST['adminId']);
         
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
<?php
include '../../dbcon.php';

if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
{
    if(!isset($errMSG))
    {
        try{

            $stmt = $con->prepare('UPDATE payment SET paymentName=:name WHERE paymentId=:id');
            $stmt -> bindParam(':name',$_POST['paymentName']);
            $stmt -> bindParam(':id',$_POST['paymentId']);
         
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
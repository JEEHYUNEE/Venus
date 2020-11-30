<?php
include '../dbcon.php';

if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
{
    if(!isset($errMSG))
    {
        try{

            $stmt = $con->prepare('UPDATE jobinfo SET status=:status WHERE id=:id');
            $stmt -> bindParam(':status',$_POST['status']);
            $stmt -> bindParam(':id',$_POST['jobInfoId']);
            
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
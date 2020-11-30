<?php
include '../../dbcon.php';

if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
{
    if(!isset($errMSG))
    {
        try{

            $stmt = $con->prepare('UPDATE deductible SET deductibleName=:name WHERE deductibleId=:id');
            $stmt -> bindParam(':name',$_POST['deductibleName']);
            $stmt -> bindParam(':id',$_POST['deductibleId']);
         
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
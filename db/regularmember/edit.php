<?php
include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';

if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
{
    if(!isset($errMSG))
    {
        try{

            $stmt = $con->prepare('UPDATE regularmember SET accountHolder = :accountHolder, account=:account, bankName=:bankName WHERE memberId=:memberId ');
            $stmt -> bindParam(':memberId',$_POST['memberId']);
            $stmt -> bindParam(':accountHolder',$_POST['accountHolder']);
            $stmt -> bindParam(':account',$_POST['account']);
            $stmt -> bindParam(':bankName',$_POST['bankName']);
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
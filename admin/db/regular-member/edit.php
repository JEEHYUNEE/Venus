<?php
include '../dbcon.php';

if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
{
    if(!isset($errMSG))
    {
        try{

            $stmt = $con->prepare('UPDATE regularmember SET workPosition=:workPosition, workPlace=:workPlace, enteredDate=:enteredDate, memberType=:type,buseoId=:buseoId, bankName=:bankName, accountHolder=:accountHolder, account=:account WHERE rmId=:id');
            $stmt->bindParam(':workPosition',$_POST['workPosition']);
            $stmt->bindParam(':workPlace',$_POST['workPlace']);
            $stmt->bindParam(':enteredDate',$_POST['enteredDate']);
            $stmt->bindParam(':type',$_POST['memberType']);
            $stmt->bindParam(':id',$_POST['rmId']);
            $stmt->bindParam(':buseoId',$_POST['buseoId']);
            $stmt->bindParam(':bankName',$_POST['bankName']);
            $stmt->bindParam(':accountHolder',$_POST['accountHolder']);
            $stmt->bindParam(':account',$_POST['account']);

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
<?php
include '../dbcon.php';
include '../apply/getApply.php';

if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
{
    if(!isset($errMSG))
    {
        try{

            $stmt = $con->prepare('INSERT INTO regularmember(memberId, jobInfoCode, companyCode, buseoId, memberType, enteredDate,workPosition,workPlace)  VALUES (:memberId,:jobInfoCode, :companyCode, :buseoId, :memberType, :enteredDate,(SELECT workPosition FROM jobinfo WHERE id=:jobInfoCode),
            (SELECT workPlace FROM jobinfo WHERE id=:jobInfoCode))');
            

            $stmt->bindParam(':memberId',$_POST['memberId']);
            $stmt->bindParam(':jobInfoCode',$_POST['jobinforCode']);
            $stmt->bindParam(':companyCode',$_POST['companyCode']);
            $stmt->bindParam(':buseoId',$_POST['buseoId']);
            $stmt->bindParam(':memberType',$_POST['memberType']);
            $stmt->bindParam(':enteredDate',$_POST['enteredDate']);
            $stmt->bindParam(':workPosition',$_POST['workPosition']);

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
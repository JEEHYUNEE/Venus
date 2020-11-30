<?php
include '../dbcon.php';

if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
{
    if(!isset($errMSG))
    {
        try{

            $stmt = $con->prepare('UPDATE jobinfo SET companyCode=:companyCode, companyName=:companyName, workPosition=:workPosition, workPlace=:workPlace, region=:region, subRegion=:subRegion, jikjong=:jikjong, applyNumber=:applyNumber, dueDate=:dueDate, managerName=:managerName,managerPhone=:managerPhone, managerEmail=:managerEmail, contents=:contents,date=:date WHERE id=:id');
            $date =date("Y-m-d"); 
            $stmt -> bindParam(':companyCode',$_POST['companyCode']);
            $stmt -> bindParam(':companyName',$_POST['companyName']);
            $stmt -> bindParam(':workPosition',$_POST['workPosition']);
            $stmt -> bindParam(':workPlace',$_POST['workPlace']);
            $stmt -> bindParam(':region',$_POST['region']);
            $stmt -> bindParam(':subRegion',$_POST['subRegion']);
            $stmt -> bindParam(':jikjong',$_POST['jikjong']);
            $stmt -> bindParam(':applyNumber',$_POST['applyNumber']);
            $stmt -> bindParam(':dueDate',$_POST['dueDate']);
            $stmt -> bindParam(':managerName',$_POST['managerName']);
            $stmt -> bindParam(':managerPhone',$_POST['managerPhone']);
            $stmt -> bindParam(':managerEmail',$_POST['managerEmail']);
            $stmt -> bindParam(':contents',$_POST['contents']);
            $stmt -> bindParam(':date',$date);
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
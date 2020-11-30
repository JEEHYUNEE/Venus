<?php
include '../dbcon.php';

if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
{
    if(!isset($errMSG))
    {
        try{
            if(isset($_POST['password'])){
                $stmt = $con->prepare('UPDATE company SET companyName=:name, password=:password, ceoName=:ceoName, crn=:crn, phone=:phone, fax=:fax, address=:address, managerName=:managerName, managerEmail=:managerEmail,managerPhone=:managerPhone, uptaeId=:uptaeId, jikjongId=:jikjongId, homepageUrl=:homepageUrl  WHERE companyId=:id');
                
                $password = base64_encode(hash('sha256',$_POST['password'],true));
                $stmt->bindParam(':password',$password);
            }else{
                $stmt = $con->prepare('UPDATE company SET companyName=:name, ceoName=:ceoName, crn=:crn, phone=:phone, fax=:fax, address=:address, managerName=:managerName, managerEmail=:managerEmail,managerPhone=:managerPhone, uptaeId=:uptaeId, jikjongId=:jikjongId, homepageUrl=:homepageUrl  WHERE companyId=:id');
            }
            $stmt -> bindParam(':name',$_POST['name']);
            $stmt -> bindParam(':ceoName',$_POST['ceoName']);
            $stmt -> bindParam(':crn',$_POST['crn']);
            $stmt -> bindParam(':phone',$_POST['phone']);
            $stmt -> bindParam(':fax',$_POST['fax']);
            $stmt -> bindParam(':address',$_POST['address']);
            $stmt -> bindParam(':managerName',$_POST['managerName']);
            $stmt -> bindParam(':managerEmail',$_POST['managerEmail']);
            $stmt -> bindParam(':managerPhone',$_POST['managerPhone']);
            $stmt -> bindParam(':jikjongId',$_POST['jikjongId']);
            $stmt -> bindParam(':uptaeId',$_POST['uptaeId']);
            $stmt -> bindParam(':homepageUrl',$_POST['homepageUrl']);
            $stmt -> bindParam(':id',$_POST['companyId']);

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
<?php
include '../dbcon.php';
include '../jhDbcon.php';
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (!isset($errMSG)) {
        try {

                $sort1 = mq("alter table jobinfo_request AUTO_INCREMENT=1;"); 
                $sort2 = mq("set @CNT = 0;"); 
                $sort3 = mq("update jobinfo_request SET jobinfo_request.jrId = @CNT:=@CNT+1;");

            
                // 후 넣기
                $stmt = $con -> prepare('INSERT INTO jobinfo_request(name, email, phone, companyName, position, title, contents) VALUES(:name, :email, :phone, :companyName, :position,:title, :contents)');
                $stmt -> bindParam(':name', $_POST['name']);
                $stmt -> bindParam(':email', $_POST['email']);
                $stmt -> bindParam(':phone', $_POST['phone']);
                $stmt -> bindParam(':companyName', $_POST['companyName']);
                $stmt -> bindParam(':position', $_POST['position']);
                $stmt -> bindParam(':title', $_POST['title']);
                $stmt -> bindParam(':contents', $_POST['contents']);

                $sort1 = mq("alter table jobinfo_request AUTO_INCREMENT=1;"); 
                $sort2 = mq("set @CNT = 0;"); 
                $sort3 = mq("update jobinfo_request SET jobinfo_request.jrId = @CNT:=@CNT+1;");


                if ($stmt -> execute()) {
                    echo "SUCCESS";
                }
                else {
                    $errMSG = "사용자 추가 에러";
                }

        } catch (PDOException $e) {
            die("Database error: ".$e -> getMessage());
        }
    }
}

?>
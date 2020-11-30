<?php
include_once '../dbcon.php';
include_once '../jhDbcon.php';
include_once '../../session.php';

if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (!isset($errMSG)) {
        try {
            // 조회수
		    $sql=mq("insert into visit(date, count) values(now(), 1) on duplicate key update date=now(), count=count+1;");

            $stmt = $con-> prepare('SELECT * FROM member WHERE memberId=:id and password=:password');
            $password = base64_encode(hash('sha256',$_POST['password'],true));
            $stmt->bindParam(':id',$_POST['id']);
            $stmt->bindParam(':password',$password);
            $stmt -> execute();
            $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
            if(sizeof($result)!=0)
            {
                echo "SUCCESS";
                $_SESSION["id"] = $_POST["id"];
            }
            else {
                echo "Doesn't Exsit";
            }
        }catch (PDOException $e) {
        die("Database error: ".$e -> getMessage());
        }
        
    }
}

?>
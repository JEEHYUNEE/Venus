<?php
include_once '../dbcon.php';
include_once '../jhDbcon.php';
include_once '../../session.php';

if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (!isset($errMSG)) {
        try {

            $stmt = $con-> prepare('SELECT memberId FROM member WHERE name=:name and email=:email');
            $stmt->bindParam(':name',$_POST['name']);
            $stmt->bindParam(':email',$_POST['email']);
            $stmt -> execute();
            $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
            if(sizeof($result)!=0)
            {
               echo $result[0]['memberId'];
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
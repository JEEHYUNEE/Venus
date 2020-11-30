<?php
function getMember() {

    include 'db/dbcon.php';

    $result = null;

    if (!isset($errMSG)) {
        try {

            $stmt = $con -> prepare('SELECT * FROM member');

            if ($stmt -> execute()) {
                $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
            }
            else {
                $errMSG = "사용자 추가 에러";
            }

        } catch (PDOException $e) {
            die("Database error: ".$e -> getMessage());
        }
    }
    return $result;

}
function getMemberById($id) {
    include 'db/dbcon.php';

    $result = null;

    if (!isset($errMSG)) {
        try {

            $stmt = $con -> prepare('SELECT * FROM member WHERE memberId=:id');
            $stmt->bindParam(':id',$id);

            if ($stmt -> execute()) {
                $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
            }
            else {
                $errMSG = "사용자 추가 에러";
            }

        } catch (PDOException $e) {
            die("Database error: ".$e -> getMessage());
        }
    }
    return $result;
}
function getMemberType() {
    include 'db/dbcon.php';

    $result = null;

    if (!isset($errMSG)) {
        try {

            $stmt = $con -> prepare('SELECT * FROM membertype');

            if ($stmt -> execute()) {
                $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
            }
            else {
                $errMSG = "사용자 추가 에러";
            }

        } catch (PDOException $e) {
            die("Database error: ".$e -> getMessage());
        }
    }
    return $result;
}
?>
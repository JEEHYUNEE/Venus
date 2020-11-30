<?php
function getRegularMember(){
    include 'db/dbcon.php';

    $result = null;

    if (!isset($errMSG)) {
        try {

            $stmt = $con -> prepare('SELECT * FROM regularmember r, member m, buseo b, membertype t , company c WHERE r.memberId = m.memberId AND r.buseoId = b.buseoId AND r.memberType=t.typeId AND r.companyCode=c.companyCode');

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
function getRegularMemberById($rmId){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/dbcon.php';

    $result = null;

    if (!isset($errMSG)) {
        try {

            $stmt = $con -> prepare('SELECT * FROM regularmember r, member m, buseo b, membertype t , company c WHERE r.memberId = m.memberId AND r.buseoId = b.buseoId AND r.memberType=t.typeId AND r.companyCode=c.companyCode AND rmId=:id');
            $stmt->bindParam(':id',$rmId);

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
function getRegularMemberByCompany($id){
    include 'db/dbcon.php';
    $result;
    $select_stmt = $con->prepare("SELECT * FROM regularmember r, member m, buseo b, membertype t , company c WHERE r.memberId = m.memberId AND r.buseoId = b.buseoId AND r.memberType=t.typeId AND r.companyCode=c.companyCode AND c.companyId=:id");
    $select_stmt->bindParam(':id',$id);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function getRegularMemberByMember(){
    include 'db/dbcon.php';
    $result;
    $select_stmt = $con->prepare("SELECT * FROM regularmember r, member m, buseo b, membertype t , company c WHERE r.memberId = m.memberId AND r.buseoId = b.buseoId AND r.memberType=t.typeId AND r.companyCode=c.companyCode");
    // $select_stmt->bindParam(':id',$rmId);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function checkRegularMember($memberId){
    include 'db/dbcon.php';
    
    $result;
 
    $select_stmt = $con->prepare("SELECT * FROM regularmember WHERE memberId=:id AND memberType<>3");
    $select_stmt->bindParam(':id',$memberId);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>
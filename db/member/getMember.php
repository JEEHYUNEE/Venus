<?php
function getMemberById($id){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM member WHERE memberId=:id');
    $stmt->bindParam(':id',$id);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result[0];
}
function isRegularMember($id){ // 현재 다니고 있는 회사의 정규회원인지?
    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM regularmember WHERE memberId=:id AND memberType<>6');
    $stmt->bindParam(':id',$id); 
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
?>
<?php 

function isApply($jobInfoId, $memberId){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM apply WHERE memberId=:memberId AND jobInfoId=:jobInfoId AND (status="채용대기" or status="채용" or status="채용거부") ');
    $stmt->bindParam(':memberId',$memberId);
    $stmt->bindParam(':jobInfoId',$jobInfoId);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
function getApplyByMember($memberId){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM jobinfo j,apply a   WHERE a.memberId=:memberId AND a.jobInfoId = j.id');
    $stmt->bindParam(':memberId',$memberId);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
function getApplyByMember_limit($memberId,$start_num,$list){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM jobinfo j,apply a   WHERE a.memberId=:memberId AND a.jobInfoId = j.id order by a.registerDate desc limit '.$start_num.",".$list);
    $stmt->bindParam(':memberId',$memberId);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
function isWait($applyId){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM apply WHERE status="채용대기" AND applyId=:applyId ');
    
    $stmt->bindParam(':applyId',$applyId);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
?>
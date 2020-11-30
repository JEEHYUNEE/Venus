<?php 

function getApply(){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM  member m, jobinfo j, apply a WHERE a.memberId = m.memberId AND a.jobInfoId = j.id');
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}

function getApplyById($id){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM  member m, jobinfo j, apply a WHERE a.memberId = m.memberId AND a.jobInfoId = j.id AND applyId=:id');
    $stmt->bindParam(':id',$id);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
function getApplyNum($id){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT count(*) FROM apply WHERE jobInfoId=:id');
    $stmt->bindParam(':id',$id);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
function getApplyStatus($memberId, $jobInfoId){
    include 'db/dbcon.php';
    
    $result;

    $select_stmt = $con->prepare("SELECT status FROM apply WHERE jobInfoId=:jobInfoId AND memberId=:memberId AND status='채용'");
    $select_stmt->bindParam(':id',$memberId);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

// 기업
function getApplyByCompany($id){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM  member m, jobinfo j, apply a WHERE a.memberId = m.memberId AND a.jobInfoId = j.id AND j.companyCode=(SELECT companyCode FROM company WHERE companyId=:id)');
    $stmt->bindParam(':id',$id);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
?>
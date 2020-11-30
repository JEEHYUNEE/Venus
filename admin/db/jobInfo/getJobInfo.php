<?php
function getJobInfo(){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/dbcon.php';
    
    $result;

    $select_stmt = $con->prepare("SELECT * FROM jobinfo");
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function getJobInfoById($id){
    include 'db/dbcon.php';
    
    $result;

    $select_stmt = $con->prepare("SELECT * FROM jobinfo WHERE id=:id");
    $select_stmt->bindParam(':id',$id);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
// 기업꺼
function getJobInfoByCompany($id){
    include 'db/dbcon.php';
    
    $result;

    $select_stmt = $con->prepare("SELECT * FROM jobinfo WHERE companyCode=(SELECT companyCode FROM company WHERE companyId=:id)");
    $select_stmt->bindParam(':id',$id);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>
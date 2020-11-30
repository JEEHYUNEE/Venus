<?php
function getJobInfoRequest(){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/dbcon.php';
    
    $result;

    $select_stmt = $con->prepare("SELECT * FROM jobinfo_request");
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function getJobInfoRequestById($id){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/dbcon.php';
    
    $result;

    $select_stmt = $con->prepare("SELECT * FROM jobinfo_request WHERE jrId=:id");
    $select_stmt->bindParam(':id',$id);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>
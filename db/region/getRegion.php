<?php
function getRegion(){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    
    $result;

    $select_stmt = $con->prepare("SELECT * FROM region");
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
function getRegion_limit($start_num, $list){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM region order by regionId desc limit '.$start_num.",".$list);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
?>
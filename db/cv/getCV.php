<?php
function getCV($id){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM cv WHERE memberId=:id');
    $stmt->bindParam(':id',$id);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
function getCV_limit($id,$start_num, $list){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM cv WHERE memberId=:id order by date desc limit '.$start_num.",".$list);
    $stmt->bindParam(':id',$id);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
?>
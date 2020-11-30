<?php
function getBuseo(){
    include 'db/dbcon.php';
    
    $result;

    $select_stmt = $con->prepare("SELECT * FROM buseo");
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>
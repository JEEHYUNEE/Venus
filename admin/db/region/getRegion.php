<?php
function getRegion(){
    include 'db/dbcon.php';
    
    $result;

    $select_stmt = $con->prepare("SELECT * FROM region");
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

?>
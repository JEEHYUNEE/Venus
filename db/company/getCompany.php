<?php
function getCompanyById($id){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM company WHERE companyId=:id');
    $stmt->bindParam(':id',$id);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result[0];
}
?>
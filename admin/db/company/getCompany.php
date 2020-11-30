<?php
function getCompany(){
    include 'db/dbcon.php';
    
    $result;

    $select_stmt = $con->prepare("SELECT * FROM company");
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getCompanyById($id){
    include 'db/dbcon.php';
    
    $result;

    $select_stmt = $con->prepare("SELECT * FROM company WHERE companyId=:id");
    $select_stmt->bindParam(':id',$id);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
function getCompanyByName($name){
    include 'db/dbcon.php';
    
    $result;

    $select_stmt = $con->prepare("SELECT * FROM company WHERE name=:name");
    $select_stmt->bindParam(':name',$name);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result[0];
}
?>
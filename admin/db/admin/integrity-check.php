<?php
    include '../dbcon.php';
    
    $result;
    $select_stmt = $con->prepare("SELECT adminId FROM administrator WHERE adminId=:id");
    $select_stmt->bindParam(':id',$_POST['adminId']);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result==null){
        echo "SUCCESS";
    }else{
        echo "Already Exist";
    }
?>

<?php
include '../dbcon.php';

if( ($_SERVER['REQUEST_METHOD'] == 'POST'))
{
    if(!isset($errMSG))
    {
        try{

            $select_stmt = $con->prepare("SELECT profileImg FROM administrator WHERE adminId=:id");
            $select_stmt->bindParam(':id',$_POST['adminId']);
            $select_stmt->execute();
            $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
            if($result[0]['profileImg']!=null){
                if(!unlink($_SERVER['DOCUMENT_ROOT'].$result[0]['profileImg'])){
                    echo "이미지 삭제 안됌..";
                }
            }
                
            $stmt = $con->prepare('DELETE FROM administrator Where adminId=:adminId');
            $stmt -> bindParam(':adminId',$_POST['adminId']);
         

            if($stmt->execute()){
                    echo "SUCCESS";
            }
            else{
                $errMSG = "사용자 추가 에러";
            }

        } catch(PDOException $e) {
            die("Database error: " . $e->getMessage()); 
        }
    }
}
?>
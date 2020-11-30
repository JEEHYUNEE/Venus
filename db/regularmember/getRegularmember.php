<?php
function getRegularMemberByMember($id){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $result;
    $select_stmt = $con->prepare("SELECT * FROM regularmember r, member m, buseo b, membertype t , company c WHERE r.memberId = m.memberId AND r.buseoId = b.buseoId AND r.memberType=t.typeId AND r.companyCode=c.companyCode AND r.memberId=:id AND memberType<>6");
    $select_stmt->bindParam(':id',$id);
    $select_stmt->execute();
    $result = $select_stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>
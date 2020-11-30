<?php
function getJobInfo(){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM jobinfo ');
    $stmt->bindParam(':id',$id);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result[0];
}
function getJobInfoById($id){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM company c,jobinfo j, jikjong jj WHERE j.companyCode = c.companyCode AND j.jikjong = jj.jikjongId AND id=:id');
    $stmt->bindParam(':id',$id);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result[0];
}
function getJobInfo_limit($start_num,$list){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM jobinfo order by id desc limit '.$start_num.",".$list);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
function getJobInfoByRegion($region){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM jobinfo, jikjong WHERE region=:region and status="진행중" and jikjong.jikjongId = jobinfo.jikjong');
    $stmt->bindParam(':region',$region);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
function getJobInfoByRegion_limit($region,$start_num,$list){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM jobinfo, jikjong WHERE region=:region and status="진행중" and jikjong.jikjongId = jobinfo.jikjong order by id desc limit '.$start_num.",".$list);
    $stmt->bindParam(':region',$region);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;

}function getJobInfoByJikjong($jikjong){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM jobinfo, jikjong WHERE jikjong=:jikjong and status="진행중" and jikjong.jikjongId = jobinfo.jikjong');
    $stmt->bindParam(':jikjong',$jikjong);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
function getJobInfoByJikjong_limit($jikjong,$start_num,$list){
    include $_SERVER['DOCUMENT_ROOT'].'/venus/db/dbcon.php';
    $stmt = $con-> prepare('SELECT * FROM jobinfo, jikjong WHERE jikjong=:jikjong and status="진행중" and jikjong.jikjongId = jobinfo.jikjong order by id desc limit '.$start_num.",".$list);
    $stmt->bindParam(':jikjong',$jikjong);
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO:: FETCH_ASSOC);
    return $result;
}
?>
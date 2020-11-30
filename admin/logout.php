<?php
    include_once 'session.php';
    session_destroy();
    echo "<script>alert('로그아웃 하셨습니다');</script>";
    if($loginType=="admin")
        echo "<script>location.href='/venus/admin/login.php';</script>";
    else   
    echo "<script>location.href='/venus/index.php';</script>";
    
?>
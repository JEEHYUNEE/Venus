<?php
    session_start();
    
    if(isset($_SESSION["adminId"])){
        $login=$_SESSION["adminId"];
        $loginType="admin";
    }
    else if(isset($_SESSION['companyId'])){
        $login=$_SESSION["companyId"];
        $loginType="company";
    }
    else{
        $login=null;
        $loginType=null;
    }
?>
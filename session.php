<?php
    session_start();
    if(isset($_SESSION["id"])){
        $loginId=$_SESSION["id"];
    }
    else{
        $loginId=null;
    }
?>
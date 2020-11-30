<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
	error_reporting(E_ALL); 
	$num=$_POST['num'];
	$email=$_POST['userEmail'];
	$filename=$_FILES["file"]["name"];
	
	//첨부 파일 읽기
	$fp = fopen($_FILES["file"]["tmp_name"], "r");
	$file = fread($fp, $_FILES["file"]["size"]);
	fclose($fp);

	$to=$email; 
	$subject = "=?utf-8?b?".base64_encode('신청하신 증명서 입니다.		[Venus_MYJH]')."?=";
	$boundary = "----" . uniqid("part"); //적당히 unique하게 만들어주면 됨
	
	$header =
	  "From: $email\r\nX-Sender: $email\r\n".
	  "MIME-Version: 1.0\r\n".
	  "Content-Type: Multipart/mixed; boundary=\"$boundary\""; //1
	
	$body =
	  "This is a multi-part message in MIME format.\r\n\r\n"."--$boundary\r\n".
	  "Content-Type: text/html; charset=utf-8\r\n"."Content-Transfer-Encoding: 8bit\r\n\r\n"."--$boundary\r\n"; //2
	  
	$body =
	  "Content-Type: application/octet-stream; name=\"".$_FILES["file"]["name"]."\"\r\n".
	  "Content-Transfer-Encoding: base64\r\n".
	  "Content-Disposition: attachment; filename=\"".$_FILES["file"]["name"]."\"\r\n\r\n".
	  base64_encode($file)."\r\n\r\n".
	  "--$boundary--"; //3
	  
	 mail($to, $subject, $body, $header);

	 $sql = mq("update certificate set situation='처리', filename='".$filename."' where certificateNum='".$num."'");
	echo "<script>alert('증명서 파일이 전송되었습니다.');</script>";
	echo "<script>opener.parent.location.reload();</script>";
	echo "<script>window.close();</script>";
?>
?>

<?php
	include_once($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/jhDbcon.php");
	error_reporting(E_ALL); 
	ini_set('display_errors',1);
	$content=$_POST['consultContent']; 
	$email=$_POST['userEmail'];
	$answer=$_POST['consultAnswer']; 

	//echo "<script>alert('.$email.');</script>";

	$to=$email; 
	$from="Venus_MYJH";
	$subject = "=?utf-8?b?".base64_encode('문의하신 내용에 대한 답변입니다.		[Venus_MYJH]')."?=";
	$body="'".$content."' 대한 답변입니다.\n\n".$answer."\n\n추가적인 연락을 원하신다면 해당 메일로 연락 부탁드립니다!\n\n";
	$headers = "From: xamppServer@example.com" . "\r\n";
	
	/* 메일 보내기 */
	$result=mail($to, $subject, $body, $headers);

	// if (!$result) {
	// 	echo "<script>alert('전송실패');</script>";
	// } else {
	// 	echo "<script>alert('전송성공');</script>";
	// }
	/* DB 업로드 */
	$sql = mq("update consult set situation='처리', answer='".$answer."' where content='".$content."'");

	echo "<script>alert('답변이 전송되었습니다.');</script>";
	echo "<script>opener.parent.location.reload();window.close();</script>";
?>
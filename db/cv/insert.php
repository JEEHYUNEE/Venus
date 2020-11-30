<?php
include $_SERVER['DOCUMENT_ROOT']."/venus/db/dbcon.php";

function upload() {
    $target_dir = $_SERVER['DOCUMENT_ROOT']."/venus/files/cv/"; // 이력서가 저장될 폴더
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    if (file_exists($target_file)) {
        unlink($target_file);//만약 해당 파일이 존재하면 파일 삭제!!
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    // if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    //     && $imageFileType != "gif") {
    //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    //     $uploadOk = 0;
    // }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo $target_file;
            // 저장후 이름바꾸기
            $now = date('Y-m-d-H-i-s');
            rename($target_file, $target_dir.$now.$_POST['memberId'].".".$fileType); 

            return "/venus/files/cv/".$now.$_POST['memberId'].".".$fileType;

        }else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
        }
    }
    return null;   
}
if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
    if (!isset($errMSG)) {
        try {
            if (sizeof($_FILES) != null) {
                $cvPath =  upload();
            }
            else {
                $cvPath = null;
            }
            $date=date('Y-m-d');
            $stmt = $con -> prepare('INSERT INTO cv(memberId, cvName, cvPath, date) VALUES(:memberId, :cvName, :cvPath, :date)');
            $stmt -> bindParam(':memberId', $_POST['memberId']);
            $stmt -> bindParam(':cvName', $_POST['cvName']);
            $stmt -> bindParam(':cvPath', $cvPath);
            $stmt -> bindParam(':date',$date);

            if ($stmt -> execute()) {
                echo "SUCCESS";
            }
            else {
                $errMSG = "사용자 추가 에러";
            }

        } catch (PDOException $e) {
            die("Database error: ".$e -> getMessage());
        }
    }
}
?>
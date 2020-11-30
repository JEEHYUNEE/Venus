<?php


function editImg() {
    $target_dir = $_SERVER['DOCUMENT_ROOT']."/venus/uploads/";
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - ".$check["mime"]. ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "EXISTS";
        // unlink($target_file);//만약 해당 파일이 존재하면 파일 삭제!!
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // echo $target_file;
            // 저장후 이름바꾸기
            rename($target_file, $target_dir."admin-".$_POST['adminId'].".".$imageFileType); 
            return "/venus/uploads/admin-".$_POST['adminId'].".".$imageFileType;
            // insertImg($_POST['adminId'].".".$imageFileType);

        } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
        }
    }
   
}
function editAdmin() {
    include '../dbcon.php';
    if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
        if (!isset($errMSG)) {
            try {
                if (sizeof($_FILES) != null) {
                    if(isset($_POST['password'])){
                        $stmt = $con -> prepare('UPDATE administrator SET password=:password, name=:name, nameEng=:nameEng, rrn=:rrn, enteredDate=:enteredDate, birthDate=:birthDate, buseo=:buseo, zikwi=:zikwi, zikcheck=:zikcheck, zikgeop=:zikgeop, phone=:phone, emergencyContact=:emergencyContact, email=:email,address=:address,profileImg=:img WHERE adminId=:adminId');
                        $password = base64_encode(hash('sha256',$_POST['password'],true));
                        $stmt -> bindParam(':password', $password);
                    }else{
                        $stmt = $con -> prepare('UPDATE administrator SET name=:name, nameEng=:nameEng, rrn=:rrn, enteredDate=:enteredDate, birthDate=:birthDate, buseo=:buseo, zikwi=:zikwi, zikcheck=:zikcheck, zikgeop=:zikgeop, phone=:phone, emergencyContact=:emergencyContact, email=:email,address=:address,profileImg=:img WHERE adminId=:adminId');
                    }
                    $img =  editImg();
                    $stmt -> bindParam(':name', $_POST['name']);
                    $stmt -> bindParam(':nameEng', $_POST['nameEng']);
                    $stmt -> bindParam(':rrn', $_POST['rrn']);
                    $stmt -> bindParam(':enteredDate', $_POST['enteredDate']);
                    $stmt -> bindParam(':birthDate', $_POST['birthDate']);
                    $stmt -> bindParam(':buseo', $_POST['buseo']);
                    $stmt -> bindParam(':zikwi', $_POST['zikwi']);
                    $stmt -> bindParam(':zikcheck', $_POST['zikcheck']);
                    $stmt -> bindParam(':zikgeop', $_POST['zikgeop']);
                    $stmt -> bindParam(':phone', $_POST['phone']);
                    $stmt -> bindParam(':emergencyContact', $_POST['emergencyContact']);
                    $stmt -> bindParam(':email', $_POST['email']);
                    $stmt -> bindParam(':address', $_POST['address']);
                    $stmt -> bindParam(':img', $img);
    
                    $stmt -> bindParam(':adminId', $_POST['adminId']);
                }
                else {
                    if(isset($_POST['password'])){
                        $stmt = $con -> prepare('UPDATE administrator SET password=:password, name=:name, nameEng=:nameEng, rrn=:rrn, enteredDate=:enteredDate, birthDate=:birthDate, buseo=:buseo, zikwi=:zikwi, zikcheck=:zikcheck, zikgeop=:zikgeop, phone=:phone, emergencyContact=:emergencyContact, email=:email,address=:address WHERE adminId=:adminId');
                        $password = base64_encode(hash('sha256',$_POST['password'],true));
                        $stmt -> bindParam(':password', $password);
                    }else{
                        $stmt = $con -> prepare('UPDATE administrator SET name=:name, nameEng=:nameEng, rrn=:rrn, enteredDate=:enteredDate, birthDate=:birthDate, buseo=:buseo, zikwi=:zikwi, zikcheck=:zikcheck, zikgeop=:zikgeop, phone=:phone, emergencyContact=:emergencyContact, email=:email,address=:address WHERE adminId=:adminId');
                    }
                
                    $stmt -> bindParam(':name', $_POST['name']);
                    $stmt -> bindParam(':nameEng', $_POST['nameEng']);
                    $stmt -> bindParam(':rrn', $_POST['rrn']);
                    $stmt -> bindParam(':enteredDate', $_POST['enteredDate']);
                    $stmt -> bindParam(':birthDate', $_POST['birthDate']);
                    $stmt -> bindParam(':buseo', $_POST['buseo']);
                    $stmt -> bindParam(':zikwi', $_POST['zikwi']);
                    $stmt -> bindParam(':zikcheck', $_POST['zikcheck']);
                    $stmt -> bindParam(':zikgeop', $_POST['zikgeop']);
                    $stmt -> bindParam(':phone', $_POST['phone']);
                    $stmt -> bindParam(':emergencyContact', $_POST['emergencyContact']);
                    $stmt -> bindParam(':email', $_POST['email']);
                    $stmt -> bindParam(':address', $_POST['address']);
                    $stmt -> bindParam(':adminId', $_POST['adminId']);
                }

               

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
}

editAdmin();
?>
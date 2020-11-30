<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/venus/admin/excel/PHPExcel-1.8/Classes/PHPExcel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/venus/admin/excel/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';
include_once  $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/salary/payment/getPayment.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/salary/deductible/getDeductible.php';
function uploadImg() {
    $target_dir = $_SERVER['DOCUMENT_ROOT']."/venus/admin/excel/";
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
        // echo "Sorry, file already exists.";
        unlink($target_file);
    }
    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "xlsx") {
        echo "Sorry, only xlsx files are allowed.";
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
            rename($target_file, $target_dir.date('Ym').".".$imageFileType);
            return date('Ym').".".$imageFileType;
        } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
            return null;
        }
    }
}
function insert($x){

    include $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/dbcon.php';

    if (($_SERVER['REQUEST_METHOD'] == 'POST')) {
        if (!isset($errMSG)) {
            try {
                $stmt = $con -> prepare('INSERT INTO salary_history(year, month, memberId,totalSalary,totalPayment,totalDeductible,paymentId,deductibleId,accountHolder,bankName,account) values(:year,:month,:memberId,:totalSalary,:totalPayment,:totalDeductible,:paymentId,:deductibleId,:accountHolder,:bankName,:account)');//여기서 memberId는 정규회원아이디 이당~~

                $payment=json_encode(json_encode($x['payment']));
                $deductible=json_encode(json_encode($x['deductible']));


                $stmt -> bindParam(':year',$x['year']);
                $stmt -> bindParam(':month', $x['month']);
                $stmt -> bindParam(':memberId', $x['rmId']);
                $stmt -> bindParam(':totalSalary', $x['totalSalary']);
                $stmt -> bindParam(':totalPayment', $x['totalPayment']);
                $stmt -> bindParam(':totalDeductible', $x['totalDeductible']);
                $stmt -> bindParam(':paymentId',$payment);
                $stmt -> bindParam(':deductibleId',$deductible);
                $stmt -> bindParam(':accountHolder',$x['accountHolder']);
                $stmt -> bindParam(':bankName',$x['bankName']);
                $stmt -> bindParam(':account',$x['account']);


                if ($stmt -> execute()) {
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
$filename = $_SERVER['DOCUMENT_ROOT']."/venus/admin/excel/".uploadImg();
ini_set('memory_limit', '1024M');
try {
    // 업로드 된 엑셀 형식에 맞는 Reader객체를 만든다. 
    $objReader = PHPExcel_IOFactory::createReaderForFile($filename);
    
    // 읽기전용으로 설정 
    $objReader -> setReadDataOnly(true);
    // 엑셀파일을 읽는다 
    $objExcel = $objReader -> load($filename);
    // 첫번째 시트를 선택 
    $objExcel -> setActiveSheetIndex(0);
    $objWorksheet = $objExcel -> getActiveSheet();
    $maxRow = $objWorksheet -> getHighestRow();
    //엑셀 row는 1번 부터 시작함. 
    

    $start = 9;
    $i=0;
    while((string)$objWorksheet -> getCell('A'.$idx=$start+$i) -> getValue()!=null){

        $data['year'] =  (string)$objWorksheet -> getCell('A5');
        $data['month'] =  (string)$objWorksheet -> getCell('B5');

        $data['rmId'] = (string)$objWorksheet -> getCell('A'.$idx=$start+$i) -> getValue(); //정규회원아이디
        $data['bankName'] = (string)$objWorksheet -> getCell('D'.$idx=$start+$i);//은행명
        $data['account'] = (string)$objWorksheet -> getCell('E'.$idx=$start+$i);//계좌번호
        $data['accountHolder'] = (string)$objWorksheet -> getCell('F'.$idx=$start+$i);//예금주
        
        $sum=0;

        for($j=0;$j<sizeof($payment=getPayment());$j++){
                $cur = chr(ord('G')+$j);
                $paymentArray[$j]['name']=$payment[$j]['paymentId'];
                $paymentArray[$j]['value']=(string)$objWorksheet -> getCell($cur.$idx=$start+$i);
                $sum+=(int)$paymentArray[$j]['value'];
            }

        $data['payment']=$paymentArray;
        $data['totalPayment']=$sum;
        $sum=0;

        for($j=0;$j<sizeof($deductible=getDeductible());$j++){
            $cur = chr(ord('G')+ sizeof(getPayment())+ $j);
            $deductibleArray[$j]['name']=$deductible[$j]['deductibleId'];
            $deductibleArray[$j]['value']=(string)$objWorksheet ->  getCell($cur.$idx=$start+$i);
            $sum+=(int)$deductibleArray[$j]['value'];
        }

        $data['deductible']=$deductibleArray;
        $data['totalDeductible']=$sum;
        $data['totalSalary']=$data['totalPayment']- $data['totalDeductible'];
        insert($data);
        $i++;
    }
    echo "SUCCESS";

} catch (exception $e) {
    echo '엑셀파일을 읽는도중 오류가 발생하였습니다.';
} 
?>
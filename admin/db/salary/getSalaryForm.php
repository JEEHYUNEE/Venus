
<?php
function cellColor($cells,$color,$color2){
    global $objPHPExcel;

    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
        ),
        'alignment' => array(

            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        
            'vertical'   => PHPExcel_Style_Alignment::VERTICAL_CENTER
        
         )
    ));
    $objPHPExcel->getActiveSheet()->getStyle($cells)->getFont()->getColor()->setARGB($color2);
}

?>
<?php 

include_once $_SERVER['DOCUMENT_ROOT'].'/venus/admin/excel/PHPExcel-1.8/Classes/PHPExcel.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/venus/admin/excel/PHPExcel-1.8/Classes/PHPExcel/IOFactory.php';
include_once  $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/salary/payment/getPayment.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/venus/admin/db/salary/deductible/getDeductible.php';?>

<?php

//set the desired name of the excel file

$fileName = 'format';
$payment = getPayment();
$deductible=getDeductible();

$column = 9 + sizeof($payment) + sizeof($deductible);

// Create new PHPExcel object

$objPHPExcel = new PHPExcel();



// Set document properties

$objPHPExcel->getProperties()->setCreator("Me")->setLastModifiedBy("Me")->setTitle("My Excel Sheet")->setSubject("My Excel Sheet")->setDescription("Excel Sheet")->setKeywords("Excel Sheet")->setCategory("Me");



// Set active sheet index to the first sheet, so Excel opens this as the first sheet

$objPHPExcel->setActiveSheetIndex(0);

$objPHPExcel->getActiveSheet()
            ->setCellValue('A4', '지급년도')
            ->setCellValue('B4', '지급월');
//회원코드, 이름, 부서, 은행, 계좌번호, 예금주, 지급항목, 공제항목, 지급액, 공제액, 수령액 // 9+

// 맨 왼쪽 항목
$objPHPExcel->getActiveSheet()
            ->setCellValue('A7', '회원코드')
            ->setCellValue('B7', '이름')
            ->setCellValue('C7', '부서')
            ->setCellValue('D7', '은행')
            ->setCellValue('E7', '계좌번호')
            ->setCellValue('F7', '예금주')
            ;

$stIdx_p = ord('A')+6; //지급 시작 아스키코드값..
// 지급항목
for($i=0;$i<sizeof($payment);$i++){
    $cur=($stIdx_p+$i);
    $chrCur = chr($cur).'8';
    $objPHPExcel->getActiveSheet()->setCellValue($chrCur,$payment[$i]['paymentName']);
}
$edIdx_p = $cur;

$stIdx_d= ord('A')+6+sizeof($payment);//공제시작 아스키코드값
// 공제항목
for($i=0;$i<sizeof($deductible);$i++){
    $cur = ($stIdx_d+$i);
    $chrCur = chr($cur).'8';
    $objPHPExcel->getActiveSheet()->setCellValue($chrCur,$deductible[$i]['deductibleName']);
}
$edIdx_d=$cur;
// 맨 오른쪽 항목
$objPHPExcel->getActiveSheet()
            ->setCellValue(chr(++$cur).'7', '지급액')
            ->setCellValue(chr(++$cur).'7', '공제액')
            ->setCellValue(chr(++$cur).'7', '실수령액');



// 위에 제목
$objPHPExcel->getActiveSheet()->mergeCells('A1:'.chr($cur).'2')
            ->setCellValue('A1', '비너스급여대장')
            ->getStyle('A1')->getFont()->setSize(20);
$objPHPExcel->getActiveSheet()->getStyle ('A1')->getAlignment ()->setVertical (PHPExcel_Style_Alignment::VERTICAL_CENTER );
$objPHPExcel->getActiveSheet()->getStyle ('A1')->getAlignment ()->setHorizontal ( PHPExcel_Style_Alignment::HORIZONTAL_CENTER );

// 왼쪽에 merge
for($i=0;$i<6;$i++){
    $cell = chr((ord('A')+$i)).'7';
    $cells = chr((ord('A')+$i)).'7:'.chr((ord('A')+$i)).'8';
$objPHPExcel->getActiveSheet()->mergeCells($cells);
$objPHPExcel->getActiveSheet()->getStyle ($cell)->getAlignment ()->setVertical (PHPExcel_Style_Alignment::VERTICAL_CENTER );
$objPHPExcel->getActiveSheet()->getStyle ($cell)->getAlignment ()->setHorizontal ( PHPExcel_Style_Alignment::HORIZONTAL_CENTER );
}

// 오른쪽에 merge
for($i=$column-1;$i>=$column-3;$i--){
    $cell = chr((ord('A')+$i)).'7';
    $cells = chr((ord('A')+$i)).'7:'.chr((ord('A')+$i)).'8';
    echo $cell;
    $objPHPExcel->getActiveSheet()->mergeCells($cells);
    $objPHPExcel->getActiveSheet()->getStyle ($cell)->getAlignment ()->setVertical (PHPExcel_Style_Alignment::VERTICAL_CENTER );
    $objPHPExcel->getActiveSheet()->getStyle ($cell)->getAlignment ()->setHorizontal ( PHPExcel_Style_Alignment::HORIZONTAL_CENTER );
}
$objPHPExcel->getActiveSheet()->mergeCells(chr($stIdx_p).'7:'.chr($edIdx_p).'7')
            -> setCellValue(chr($stIdx_p).'7','지급항목');
$objPHPExcel->getActiveSheet()->getStyle (chr($stIdx_p).'7')->getAlignment ()->setVertical (PHPExcel_Style_Alignment::VERTICAL_CENTER );
$objPHPExcel->getActiveSheet()->getStyle (chr($stIdx_p).'7')->getAlignment ()->setHorizontal ( PHPExcel_Style_Alignment::HORIZONTAL_CENTER );

$objPHPExcel->getActiveSheet()->mergeCells(chr($stIdx_d).'7:'.chr($edIdx_d).'7')
            -> setCellValue(chr($stIdx_d).'7','공제항목');
$objPHPExcel->getActiveSheet()->getStyle (chr($stIdx_d).'7')->getAlignment ()->setVertical (PHPExcel_Style_Alignment::VERTICAL_CENTER );
$objPHPExcel->getActiveSheet()->getStyle (chr($stIdx_d).'7')->getAlignment ()->setHorizontal ( PHPExcel_Style_Alignment::HORIZONTAL_CENTER );

// 색깔입히기
cellColor('A1','696969','FFFFFFFF');        
cellColor('A7:'.chr($cur).'8', '696969','FFFFFFFF');
cellColor('A4:B4', '696969','FFFFFFFF');





// Set worksheet title

$objPHPExcel->getActiveSheet()->setTitle($fileName);



//save the file to the server (Excel2007)

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

$objWriter->save($_SERVER['DOCUMENT_ROOT']."/venus/admin/db/salary/".$fileName.".xlsx");
// $objWriter->save('.\\' . $fileName . '.xlsx');



?>

<?php

// 파일 다운로드 구현

function mb_basename($path) { return end(explode('/',$path)); }

function utf2euc($str) { return iconv("UTF-8","cp949//IGNORE", $str); }

function is_ie() {

if(!isset($_SERVER['HTTP_USER_AGENT']))return false;

if(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false) return true; // IE8

if(strpos($_SERVER['HTTP_USER_AGENT'], 'Windows NT 6.1') !== false) return true; // IE11

return false;

}



$filepath = './format.xlsx';

$filesize = filesize($filepath);

$filename = mb_basename($filepath);

if( is_ie() ) $filename = utf2euc($filename);



header("Pragma: public");

header("Expires: 0");

header("Content-Type: application/octet-stream");

header("Content-Disposition: attachment; filename=\"$filename\"");

header("Content-Transfer-Encoding: binary");

header("Content-Length: $filesize");

ob_clean();

flush();

readfile($filepath);


//출처:::http://soyun170830.ipdisk.co.kr:8000/wp/2018/03/23/php%EC%97%90%EC%84%9C-excel-%ED%8C%8C%EC%9D%BC%EC%9D%84-%EB%A7%8C%EB%93%A4-%EC%88%98-%EC%9E%88%EB%8A%94-phpexcel/
?>

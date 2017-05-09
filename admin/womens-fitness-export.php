<?php
include_once "../inc/dbconfig.php";

switch ($_REQUEST['a']) {
	case "allrec":
		$result = $mysqli->query("SELECT firstname,lastname,businessname,address,address2,city,state,zip,email,phone,numberstudents,hear FROM womensfitness ORDER BY lastname ASC");
    $headings = array("First","Last","Women's Fitness Club Name","Address","Address 2","City","State","Zip Code","E-Mail","Phone","Number of Female Members","How did you hear about the Women's Fitness Sample Packs?");
		$lastcol = "N";
		break;
	case "unexprec":
		$result = $mysqli->query("SELECT firstname,lastname,businessname,address,address2,city,state,zip,email,phone,numberstudents,hear FROM womensfitness WHERE exported = '' ORDER BY lastname ASC");
    $headings = array("First","Last","Women's Fitness Club Name","Address","Address 2","City","State","Zip Code","E-Mail","Phone","Number of Female Members","How did you hear about the Women's Fitness Sample Packs?");
		$lastcol = "N";
		break;
  case "allemail":
    $result = $mysqli->query("SELECT email FROM womensfitness ORDER BY email ASC");
    $headings = array("E-Mail");
		$lastcol = "A";
		break;
	case "unexpemail":
    $result = $mysqli->query("SELECT email FROM womensfitness WHERE exported = '' ORDER BY id ASC");
    $headings = array("E-Mail");
		$lastcol = "A";
		break;
}

$filetag = "womens-fitness-" . date("Ymd-Hi");

// require the PHPExcel file
require 'inc/PHPExcel.php';

// Create a new PHPExcel object
$objPHPExcel = new PHPExcel();
$objPHPExcel->getActiveSheet()->setTitle($filetag);

$rowNumber = 1;
$col = 'A';
foreach($headings as $heading) {
  $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$heading);
  $col++;
}

// Loop through the result set
$rowNumber = 2;
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
  $col = 'A';
  foreach($row as $cell) {
    $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$cell);
    $col++;
  }
  $rowNumber++;
}

// Format the header cells and autosize the columns
$objPHPExcel->getActiveSheet()->getStyle('A1:'.$lastcol.'1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('DDDDDDDD');
$objPHPExcel->getActiveSheet()->getStyle('A1:'.$lastcol.'1')->getFont()->setBold(true);
for ($i=A; $i<=$lastcol; $i++) {
  $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(true);
}

$objPHPExcel->getActiveSheet()->setSelectedCell('A' . $rowNumber);

// Save as an Excel BIFF (xls) file
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');

// Save as an Excel 2007 (xlsx) file
//$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, "Excel2007");

$mysqli->query("UPDATE womensfitness SET exported = 'on'");

header('Content-Type: application/vnd.ms-excel');
//header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="' . $filetag . '.xls"');
header('Cache-Control: max-age=0');

$objWriter->save('php://output');
?>
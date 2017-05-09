<?php
include_once "../inc/dbconfig.php";

switch ($_REQUEST['a']) {
	case "allrec":
		$result = mysql_query("SELECT firstname,lastname,businessname,address,address2,city,state,zip,email,phone,numberstudents,addresstype,instructor,hear FROM yogafit ORDER BY lastname ASC");
    $headings = array("First","Last","Company","Address","Address 2","City","State","Zip Code","E-Mail","Phone","Number of Students","Address Type","Instructor","How Did You Hear of YogaFit");
		$lastcol = "N";
		break;
	case "unexprec":
		$result = mysql_query("SELECT firstname,lastname,businessname,address,address2,city,state,zip,email,phone,numberstudents,addresstype,instructor,hear FROM yogafit WHERE exported = '' ORDER BY lastname ASC");
    $headings = array("First","Last","Company","Address","Address 2","City","State","Zip Code","E-Mail","Phone","Number of Students","Address Type","Instructor","How Did You Hear of YogaFit");
		$lastcol = "N";
		break;
  case "allemail":
    $result = mysql_query("SELECT email FROM yogafit ORDER BY email ASC");
    $headings = array("E-Mail");
		$lastcol = "A";
		break;
	case "unexpemail":
    $result = mysql_query("SELECT email FROM yogafit WHERE exported = '' ORDER BY id ASC");
    $headings = array("E-Mail");
		$lastcol = "A";
		break;
}

$filetag = date("Ymd-Hi");

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
while ($row = mysql_fetch_row($result)) {
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

mysql_query("UPDATE yogafit SET exported = 'on'");

header('Content-Type: application/vnd.ms-excel');
//header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
header('Content-Disposition: attachment;filename="' . $filetag . '.xls"');
header('Cache-Control: max-age=0');

$objWriter->save('php://output');
?>
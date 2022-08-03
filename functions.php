<?php
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReader;
use \PhpOffice\PhpSpreadsheet\Writer\IWriter;


$conn = mysqli_connect("localhost", "root", "", "projepabim");


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function spread($title){
    // Spread start

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
$reader->setReadDataOnly(true);
$spreadsheet = $reader->load($title['fiel']);
$data = $spreadsheet->getActiveSheet()->toArray();
for($i= 11; $i<count($data) -5;$i++){
    $npm = "";
    $nama = "";
    $kelulusan = "";
// echo $data[$i][1] . "&nbsp;&nbsp;&nbsp";
// echo $data[$i][2] . "&nbsp;&nbsp;&nbsp";
// echo $data[$i][9]. "&nbsp;&nbsp;&nbsp";
if($data[$i][9]=="LULUS"){
    $kelulusan = 1;
}
$npm=$data[$i][1];
$nama=$data[$i][2];
// echo $npm."&nbsp;&nbsp;&nbsp";
// echo $nama."&nbsp;&nbsp;&nbsp";
// echo $kelulusan."&nbsp;&nbsp;&nbsp";
// echo("<br>");
global $conn;
$query = "INSERT INTO main
				VALUES
			  ('', '$npm', '$nama', '', '', '', '', '', '$kelulusan', '', '')
			";
	mysqli_query($conn, $query);

}
return mysqli_affected_rows($conn);
// Spread End

}

function upload($fles){
	$namaFile = $_FILES['fiel']['name'];
	$namaSementara = $_FILES['fiel']['tmp_name'];
	$dirUpload = "./dataset/";
	$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
	$title = [
		'namefile'=> $namaFile,
		'namasemester'=> $fles['smester']
	];
	spread($namaFile);
}
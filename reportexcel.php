<?php
	//membuka koneksi ke database
	include "koneksi.php";
	//memanggil library
	require 'assets/vendor/autoload.php';
	// We'll be outputting an excel file
    header('Content-type: application/vnd.ms-excel');
    
    // It will be called file.xls
    header('Content-Disposition: attachment; filename="file.xlsx"');
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	//menuliskan nama kolom
	$spreadsheet=new spreadsheet();
	$sheet=$spreadsheet->getActiveSheet();
	$sheet->setCellValue('F1','Daftar Pemilih Tetap');
	$sheet->setCellValue('A2','No.');
	$sheet->setCellValue('B2','NPM');
	$sheet->setCellValue('C2','Nama Pemilih');
	$sheet->setCellValue('D2','Angkatan');

	//mengambil data pada database dan menuliskan di excel
	$query=mysqli_query($koneksi,"SELECT tb_pengguna.npm, tb_pengguna.nama_pengguna, tb_pengguna.angkatan from tb_pengguna where jenis = 'PST'");
	$i=3;
	$no=1;
	while($row=mysqli_fetch_array($query)){
	   // print_r($row);
		$sheet->setCellValue('A'.$i,$no++);
		$sheet->setCellValue('B'.$i,$row['npm']);
		$sheet->setCellValue('C'.$i,$row['nama_pengguna']);
		$sheet->setCellValue('D'.$i,$row['angkatan']);
		$i++;
	}

	//style
	$styleArray=[
				'borders'=>[
					'allBorders'=>[
						'borderStyle'=>PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
					],
				],
	];

	//memunculkan file excel
	$i=$i-1;
	$sheet->getStyle('A2:F'.$i)->applyFromArray($styleArray);
	$writer=new Xlsx($spreadsheet);
// 	$writer->save('Daftar Pemilih Tetap.xlsx');
    $writer->save('php://output');
	
?>
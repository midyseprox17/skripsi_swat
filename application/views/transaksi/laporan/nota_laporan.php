<?php
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
// require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 002');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 20);

// add a page
$pdf->AddPage();

	$id = $transaksi[0]->id;
	$nama = $transaksi[0]->nama;
	$telp = $transaksi[0]->telp; 
	$tgl_masuk = $transaksi[0]->tgl_masuk;
	$tgl_selesai = $transaksi[0]->tgl_selesai;
	$total = $transaksi[0]->total;


	$nama_jenis = $detail_transaksi[0]->nama_jenis; 
	$jml = $detail_transaksi[0]->qty.$detail_transaksi[0]->satuan; 
	$harga = $detail_transaksi[0]->harga; 

	

// set some text to print
$txt = <<<EOD
<table width="50%" class="gambar">
			<tr>
				<td align="center">
					<h1>"Mama Laundry"</h1>
					<h3>Jl. Regol RT. 04 RW. 08
					<br>
						Telp. 085759898063
					</h3><hr>			
				</td>
			</tr>
			<tr>
				<td>
					<table align="center" width="90%">
						
							<tr>
								<td>No. ID</td>
								<td>: $id </td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>: $nama</td>
							</tr>
							<tr>
								<td>Telp.</td>
								<td>: $telp</td>
							</tr>
							<tr>
								<td>Tgl. Masuk</td>
								<td>: $tgl_masuk</td>
							</tr>
							<tr>
								<td>Tgl. Selesai</td>
								<td>: $tgl_selesai</td>
							</tr>
							<tr>
								<td>Total Harga</td>
								<td>: $total</td>
							</tr>
						
						
					</table><hr>			
				</td>
			</tr>
			<tr>
				<td>
					<table width="90%">
						<tr>
							<th width="30%">Jenis</th>
							<th width="20%" align="center">Qty</th>
							<th width="50%" align="center">Hrga</th>
						</tr>
						
							<tr>
								<td>$nama_jenis</td>
								<td align="center">$jml</td>
								<td align="center">Rp. $harga</td>
							</tr>
						
					</table>
				</td>
			</tr>
			<tr>
				<td><hr>
					<font size="2">
					<b>PERHATIAN:</b><br>
					<ol>
						<li>Pengambilan barang harus dengan nota</li>
						<li>Kain luntur/mengkerut sendiri diluar tanggungan</li>
						<li>Hak klaim berlaku 24jam dari waktu pengambilan</li>
						<li>Bon hanya berlaku 40 hari dari tanggal selesai</li>
						<li>Kami tidak bertanggung jawab atas hilangnya kancing/barang yang tertinggal didalamnya</li>
						<li>Segala kerusakan yang disebabkan karena rapuh, diluar tanggung jawab kami</li>
						<li>Jika memberikan uang lebih dari total, maka tidak ada kembalian</li>
						<li>Setiap konsumen dianggap setuju dengan isi perjanjian diatas</li>
					</ol>
					</font>
				</td>
			</tr>
		</table>
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_002.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

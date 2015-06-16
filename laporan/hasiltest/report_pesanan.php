<?php
	require('/fpdf/fpdf.php');
	include_once $_SERVER['DOCUMENT_ROOT'] . '/config/database.php';

	$database = new database();
	$db = $database->getConnection();

	include_once $_SERVER['DOCUMENT_ROOT'] . '/objects/pesanan.php';

	$pesanan = new pesanan($db);
	$statement = $pesanan->ViewReport();
	$i = 0;
	$TOTALS = 0;
	$TOTALQTY = 0;
	
	while ($row = $statement->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$cell[$i][0] = $pesanan_no;
		$cell[$i][1] = $pesanan_tgl;
		$cell[$i][2] = $email;
		$cell[$i][3] = $tujuan;
		$cell[$i][4] = $jenis;
		$cell[$i][5] = $qty;
		$cell[$i][6] = $total;
		$TOTALS = $TOTALS + $total;
		$TOTALQTY = $TOTALQTY + $qty;
		$i++;
	}

	class PDF extends FPDF{
		function Header()
		{
			$this->SetFont('Arial','B',20);
			//Move to the right
			$this->Cell(-1);
			//Title
			$this->Cell(30,2,'Laporan Pesanan',0,0,'C');
			//Line break
			$this->Ln(2);
		}

		function Footer()
		{
			$this->SetY(15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Halaman Ke :' . $this->PageNo(), 0,0,'C');
		}
	}

	$pdf = new PDF('L','cm','A4');
	$pdf->Open();
	$pdf->AddPage();
	$pdf->SetTitle('Report');
	$pdf->SetFont('Arial','B',12);
	//ROW TABLE HEADER
	$pdf->Cell(1,1,'No','LRTB',0,'C');
	$pdf->Cell(3,1,'Pesanan No','LRTB',0,'C');
	$pdf->Cell(3,1,'Tgl Pesanan','LRTB',0,'C');
	$pdf->Cell(5,1,'E-Mail','LRTB',0,'C');
	$pdf->Cell(4.5,1,'Tujuan','LRTB',0,'C');
	$pdf->Cell(3.5,1,'Jenis','LRTB',0,'C');
	$pdf->Cell(2,1,'Jumlah','LRTB',0,'C');
	$pdf->Cell(5,1,'Total (Rp)','LRTB',0,'C');
	$pdf->Ln();
	//ROW TABLE ITEM
	$pdf->SetFont('Times','',10);

	for($j=0;$j<$i;$j++)
	{
		$pdf->Cell(1,1,$j+1,'LRTB',0,'C');
		$pdf->Cell(3,1,$cell[$j][0],'LRTB',0,'L');
		$pdf->Cell(3,1,$cell[$j][1],'LRTB',0,'C');
		$pdf->Cell(5,1,$cell[$j][2],'LRTB',0,'L');
		$pdf->Cell(4.5,1,$cell[$j][3],'LRTB',0,'L');
		$pdf->Cell(3.5,1,$cell[$j][4],'LRTB',0,'L');
		$pdf->Cell(2,1,number_format($cell[$j][5], 0, ',', '.'),'LRTB',0,'C');
		$pdf->Cell(5,1,number_format($cell[$j][6], 2, ',', '.'),'LRTB',0,'R');
		$pdf->Ln();
	}
	$pdf->SetFont('Times','B',12);
	$pdf->Cell(20,1, 'TOTAL', 1, 0, 'C');
	$pdf->Cell(2,1, number_format($TOTALQTY, 0, ',', '.'), 1, 0, 'C');
	$pdf->Cell(5,1, number_format($TOTALS, 2, ',', '.'),1,0,'R');

	$pdf->Output();

?>

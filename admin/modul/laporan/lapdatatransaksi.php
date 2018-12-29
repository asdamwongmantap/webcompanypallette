<?php
session_start();
include "../../../config/koneksi.php";
   require('laporan/fpdf.php');

  // Tampil Order
  
 
	$query ="SELECT o.id_orders, o.tgl_order, o.jam_order, o.id_kustomer, k.nama_lengkap, k.alamat, k.aktif FROM orders o, kustomer k  where o.id_kustomer=k.id_kustomer ORDER BY o.id_orders";
    $db_query = mysql_query($query) or die("Query gagal");
    //Variabel untuk iterasi
    $i = 0;
    //Mengambil nilai dari query database
    while($data=mysql_fetch_row($db_query))
    {
        $cell[$i][0] = $data[0];
        $cell[$i][1] = $data[1];
        $cell[$i][2] = $data[2];
        $cell[$i][3] = $data[3];
		$cell[$i][4] = $data[4];
        $cell[$i][5] = $data[5];
        $cell[$i][6] = $data[6];
	
        $i++;
    }
    //memulai pengaturan output PDF
    class PDF extends FPDF
    {
        //untuk pengaturan header halaman
        function Header()
        {
			
            //Pengaturan Font Header
            $this->SetFont('helvetica','B',33); //jenis font : Times New Romans, Bold, ukuran 13
            //untuk warna background Header
            $this->SetFillColor(233,233,233);
            //untuk warna text
            $this->SetTextColor(0,0,0);
            //Menampilkan tulisan di halaman
            $this->Cell(34,1,'LAPORAN DATA TRANSAKSI PENJUALAN',"",1,'C',1);
			$this->Cell(34,1,'TOKO ARRIZAL',"",1,'C',1); //TBLR (untuk garis)=> B = Bottom,
            // L = Left, R = Right
            //untuk garis, C = center
        }
		function Footer()
		{
			// Go to 1.5 cm from bottom
			$this->SetY(-07);
			// Select Arial italic 8
			$this->SetFont('Arial',"",8);
			// Print current and total page numbers
			$this->Cell(0,10,''.$this->PageNo()."",0,0,'C');
		}
    }
    //pengaturan ukuran kertas P = Portrait, L=Landscape
	$pdf = new PDF('L','cm','legal');
    $pdf->Open();
    $pdf->AddPage();
    //Ln() = untuk pindah baris
    $pdf->Ln();
    $pdf->SetFont('arial','B',18);
	// arti formatnya $pdf->Cell('Lebarnya','Tingginya','Header Text','LRTB',0,'C') 
   // $pdf->Cell(1,1,'NO','LRTB',0,'C');
	$pdf->Cell(4,1,'No Order','LRTB',0,'C');
    $pdf->Cell(5,1,'Tanggal Order','LRTB',0,'C');
    $pdf->Cell(5,1,'Jam Order','LRTB',0,'C');
    $pdf->Cell(5,1,'ID Kustomer','LRTB',0,'C');
	$pdf->Cell(6,1,'Nama Kustomer','LRTB',0,'C');
	$pdf->Cell(6,1,'Alamat Kustomer','LRTB',0,'C');
	$pdf->Cell(3,1,'Aktif','LRTB',0,'C');
	
	
    $pdf->Ln();
    $pdf->SetFont('arial',"",15);
    for($j=0;$j<$i;$j++)
    {
        //menampilkan data dari hasil query database
       // $pdf->Cell(1,1,$j+1,'LBTR',0,'C');
		$pdf->Cell(4,1,$cell[$j][0],'LBTR',0,'C');
        $pdf->Cell(5,1,$cell[$j][1],'LBTR',0,'C');
        $pdf->Cell(5,1,$cell[$j][2],'LBTR',0,'C');
        $pdf->Cell(5,1,$cell[$j][3],'LBTR',0,'C');
		$pdf->Cell(6,1,$cell[$j][4],'LBTR',0,'C');
        $pdf->Cell(6,1,$cell[$j][5],'LBTR',0,'C');
        $pdf->Cell(3,1,$cell[$j][6],'LBTR',0,'C');
		
		
        
		
        $pdf->Ln();
    }
    //menampilkan output berupa halaman PDF
    $pdf->Output();
?>


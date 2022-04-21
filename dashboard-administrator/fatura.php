<?php
//call the FPDF library
require('fpdf184/fpdf.php');
include "db_conn.php";
//A4 width : 219mm
//default margin : 10mm each side
//writable horizontal : 219-(10*2)=189mm
define('EURO',chr(128));
$sql = "SELECT* FROM card";
$result = $conn->query($sql);

class PDF extends FPDF
{
// Page header
function Header()
{
    $image1 = "img/logo.png";
    // Logo
    $this->Image($image1, 70, 0, -400);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    // $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
}
// Page footer
// function Footer()
// {
//     // Position at 1.5 cm from bottom
//     $this->SetY(-15);
//     // Arial italic 8
//     $this->SetFont('Arial','I',8);
//     // Page number
//     $this->Cell(0,10,'Page '.$this->PageNo().'',0,0,'C');
// }

}

// $image1 = "img/logo.png";
//create pdf object
$pdf = new PDF('P','mm','A4');
//add new page
$pdf->AddPage();

//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);

//Cell(width , height , text , border , end line , [align] )
// $pdf->Image('logo.png',10,10,-300);
// $pdf->Image($image1,10,10, -400);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $product= $row["product"];
        $total =  $row["total"];
        $payment = $row["payment"];
        $tavolina = $row["tavolina"];
        $koha = $row["koha"];
    }
}
// $this->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
$pdf->Cell(130 ,5,'ALP',0,0);
$pdf->Cell(59 ,5,'FATURA',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

// $pdf->Cell(130 ,5,'[]',0,0);
// $pdf->Cell(59 ,5,'',0,1);//end of line
$randomgen = rand( 10000 , 99999 );
$randomgenclient = rand(1, 99999);
$pdf->Cell(130 ,5,'[Prishtine, Kosove]',0,0);
$pdf->Cell(25 ,5,'Data',0,0);
$pdf->Cell(34 ,5,$koha,0,1);//end of line

$pdf->Cell(130 ,5,'Tel: [+12345678]',0,0);
$pdf->Cell(25 ,5,'Fatura',0,0);
$pdf->Cell(34 ,5,' #'.$randomgen,0,1);//end of line

$pdf->Cell(130 ,5,'Fax: [+12345678]',0,0);
$pdf->Cell(25 ,5,'Klient ID: ',0,0);
$pdf->Cell(34 ,5,$randomgenclient,0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

// //billing address
// $pdf->Cell(100 ,5,'Bill to',0,1);//end of line

// //add dummy cell at beginning of each line for indentation
// $pdf->Cell(10 ,5,'',0,0);
// $pdf->Cell(90 ,5,'[Name]',0,1);

// $pdf->Cell(10 ,5,'',0,0);
// $pdf->Cell(90 ,5,'[Company Name]',0,1);

// $pdf->Cell(10 ,5,'',0,0);
// $pdf->Cell(90 ,5,'[Address]',0,1);

// $pdf->Cell(10 ,5,'',0,0);
// $pdf->Cell(90 ,5,'[Phone]',0,1);

// //make a dummy empty cell as a vertical spacer
// $pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(100 ,5,'Artikujt',1,0);
// $pdf->Cell(25 ,5,'TVSH',1,0);
$pdf->Cell(69 ,5,'Totali',1,1, "R");//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter
//Lista e produkteve

$pdf->Cell(100 ,5,$product,1,0);
// $pdf->Cell(25 ,5,'-',1,0);
$pdf->Cell(69 ,5,$total,1,1,'R');//end of line

// $pdf->Cell(100 ,5,'Pasta Bolognese',1,0);
// // $pdf->Cell(25 ,5,'-',1,0);
// $pdf->Cell(69 ,5,'2.50',1,1,'R');//end of line

// $pdf->Cell(100 ,5,'Pizza Margarita',1,0);
// // $pdf->Cell(25 ,5,'-',1,0);
// $pdf->Cell(69 ,5,'1,50',1,1,'R');//end of line

//summary
$pdf->Cell(100 ,5,'',0,0);
$pdf->Cell(35 ,5,'Para te gatshme:',0,0);
$pdf->Cell(4 ,5,EURO,1,0);
$pdf->Cell(30 ,5,$total,1,1,'R');//end of line

// $pdf->Cell(130 ,5,'',0,0);
// $pdf->Cell(25 ,5,'Taxable',0,0);
// $pdf->Cell(4 ,5,'$',1,0);
// $pdf->Cell(30 ,5,'0',1,1,'R');//end of line
$totalmetvsh = $total*0.18;
$pdf->Cell(100 ,5,'',0,0);
$pdf->Cell(35 ,5,'TVSH 18%:',0,0);
$pdf->Cell(4 ,5,EURO,1,0);
$pdf->Cell(30 ,5,$totalmetvsh,1,1,'R');//end of line

$pdf->Cell(100 ,5,'',0,0);
$pdf->Cell(35 ,5,'Total pa TVSH:',0,0);
$pdf->Cell(4 ,5,EURO,1,0);
$pdf->Cell(30 ,5,$total-$totalmetvsh,1,1,'R');//end of line
//output the result
$pdf->Output('I', "Fatura.pdf", true);



?>
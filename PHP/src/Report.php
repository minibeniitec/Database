<?php 
require("fpdf181/fpdf.php"); 

$pdf = new fpdf();
$pdf->AddPage();
$pdf->SetTitle('Game Repo: Your Receipt');

//Set font and colors
$pdf->SetFont('Arial','B',16);
$pdf->SetFillColor(255,0,0);
$pdf->SetTextColor(255);
$pdf->SetDrawColor(128,0,0);
$pdf->SetLineWidth(.3);

//Table header
/*$pdf->Cell(20,10,'Quantity',1,0,'L',1);
$pdf->Cell(50,10,'Item',1,1,'L',1);*/

//Restore font and colors
$pdf->SetFont('Arial','',10);
$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);

//Connection and query
$res=pg_query($db,'select * from Product');
$numregs=pg_numrows($res);

//Cell(width , height , text , border , end line , [align] )

$pdf->Cell(130 ,5,'GameRepo',0,0);
$pdf->Image('logo.png',170,5,30,0);
$pdf->Cell(59 ,5,'INVOICE',0,1);//end of line

//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',12);

if(isset($_POST['submit'])){
$first = $_POST['first-name'];
$last = $_POST['last-name'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$country = $_POST['country'];
$zip = $_POST['zip-code'];
$tel = $_POST['tel'];

$pdf->Cell(130 ,5,'[Street Address]: ',0,0);
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(130 ,5,'[City, Country, ZIP]',0,0);
$pdf->Cell(25 ,5,'Date:',0,0);
$pdf->Cell(34 ,5,'[19/06/1994]',0,1);//end of line

$pdf->Cell(130 ,5,'Phone [+12345678]',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

$pdf->Cell(130 ,5,'Fax [+12345678]',0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,'[1234567]',0,1);//end of line

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5, $first,0,0);
$pdf->Cell(0 ,5, $last,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$email,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$address,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$city,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$country,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$zip,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$tel,0,1);
}

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(130 ,5,'Description',1,0);
$pdf->Cell(25 ,5,'Quantity',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Build table
$fill=false;
$i=0;
$totalprice = 0;
$totalquantity = 0;
$tax = .08875;
$a = 0;
$b = 0;


$price = $_POST['price'];
$quantity = $_SESSION['cart'][$_POST['id']]['quantity'];

foreach($_SESSION['cart'] as $key => $val){
	$totalprice += $_SESSION['cart'][$key]['price'] * $_SESSION['cart'][$key]['quantity'];
    $totalquantity += $_SESSION['cart'][$key]['quantity'];
}

$totalprice_with_tax = $totalprice * $tax;
$a = $totalprice_with_tax + $totalprice;


foreach($_SESSION['cart'] as $key => $val)
{
    
    $name=pg_result($res,$i,'name');
    $pri=pg_result($res,$i,'price');
    $pdf->Cell(130,10,$name,1,0,'L',$fill);
    $pdf->Cell(25,10,$val['quantity'],1,0,'C',$fill);
    $pdf->Cell(34,10,$pri,1,1,'C',$fill);
    $fill=!$fill;
    $i++;

}

$pdf->SetFont('Arial','B',12);

$pdf->Cell(50, 10,'Total Amount of Items',1,0, 'L');
$pdf->Cell(50, 10,$totalquantity,1,1, 'L');

$pdf->Cell(50, 10,'Total Price',1,0, 'L');
$pdf->Cell(50, 10,$totalprice,1,1, 'L');

$pdf->Cell(50, 10,'Taxes',1,0, 'L');
$pdf->Cell(50, 10, '8.875%',1,1, 'L');

$pdf->Cell(50, 10,'Taxes',1,0, 'L');
$pdf->Cell(50, 10,$a,1,1, 'L');



/*Add a rectangle, a line, a logo and some text
$pdf->Rect(5,5,170,80);
$pdf->Line(5,90,90,90);
$pdf->Image('logo.png',185,5,10,0);
$pdf->SetFillColor(224,235);
$pdf->SetFont('Arial','B',8);
$pdf->SetXY(5,95);
$pdf->Cell(170,5,'PDF gerado via PHP acessando banco de dados - Por Ribamar FS',1,1,'L',1);*/

$pdf->Output();

?>
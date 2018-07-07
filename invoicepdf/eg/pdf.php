<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
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
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('BANYANINFOTECH');
$pdf->SetTitle('PAYSLIP');
$pdf->SetSubject('PAYSLIP');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' Company Name ', PDF_HEADER_STRING.' No 103, Address1,Address2, Coimbatore - 641407');
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 8);
$tbl = <<<EOD
<style>
    		body{
        		font-size:14px;
        		font-familly:Times New Roman;
    		}
    		table,td{
    			//border: 1px solid balck;
    			padding: 5px;
    		}
    		.hed{
        		text-align:center;
    		}
    		.date{
        		text-align:right;
    		}
		</style>
<body>
<table>
<tr>
		<td><b>Invoice Number</b></td>
		<td>INV_075</td>
		</tr>
		<tr>
		<td><b>Invoice Date</b></td>
		<td>2018-2-21</td>
		</tr>
		<tr>
		<td><b>Terms</b></td>
		<td>data</td>
		</tr>
		<tr>
		<td><b>Due Date</b></td>
		<td>2017-2-21</td>
		</tr>
		
</table>
<p></p>
<h2>Bill To:</h2>
<p>Customer Details</p>
</body>
EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');
$tb2 = <<<EOD
<style>
    		body{
        		font-size:14px;
        		font-familly:Times New Roman;
    		}
    		table,td{
    			border: 1px solid balck;
    			padding: 7px;
    		}
    		.hed{
        		text-align:center;
    		}
    		.date{
        		text-align:right;
    		}
		</style>
		<body>
<table width="100%" style="border: 1px solid black">
        <tr>
        <td width="40"><b>#</b></td>
        <td width="320"><b>Item & Description</b></td>
        <td width="80"><b>Quantity</b></td>
        <td width="90"><b>Rate</b></td>
        <td width="50"><b>GST</b></td>
        <td width="90"><b>Amount</b></td>
        </tr>
        <tr>
        <td >1</td>
        <td >STW 50 SUITABLE TO COVER 15 LOOMS IN 1.00 615,570.00 615,570.00
STRAIGHT LINE WITH 92 MTR RAILING AND 1UNIT</td>
        <td >1.00</td>
        <td >615,570.00</td>
        <td>18 % </td>
        <td >615,570.00</td>
        </tr>
        <tr>
        <td >2</td>
        <td >STW 50 SUITABLE TO COVER 15 LOOMS IN 1.00 615,570.00 615,570.00
STRAIGHT LINE WITH 92 MTR RAILING AND 1UNIT</td>
        <td >1.00</td>
        <td >615,570.00</td>
        <td>18 %</td>
        <td >615,570.00</td>
        </tr>
        <tr>
        <td colspan="3"  rowspan="7" align="center"><b>Rupees: Seven Lakhs Forty Four Thousand Seventy Three Only</b></td>
        <td width="105"><b>Subtotal</b></td>
        <td width="125">Rs 615,570.00</td>
        </tr>
        <tr>
        <td ><b>Discount</b></td>
        <td >Rs 0</td>
        </tr>
        <tr>
        <td ><b>GST</b></td>
        <td >Rs 113,502.60</td>
        </tr>
        <tr>
        <td><b>Nett Amount</b></td>
        <td>Rs 744,073.00</td>
        </tr>
</table>
</body>
EOD;
$pdf->writeHTML($tb2, true, false, false, false, '');

$tb4 = <<<EOD
<style>
    		body{
        		font-size:14px;
        		font-familly:Times New Roman;
    		}
		</style>
<body>
<table>
<tr>
<td align="right">Authorized Signature</td>
</tr>
</table>
</body>
EOD;
$pdf->writeHTML($tb4, true, false, false, false, '');
$pdf->Output('payslip.pdf', 'I');

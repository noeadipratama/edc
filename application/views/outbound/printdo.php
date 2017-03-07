<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attaachment; filename=cetakdo.xls");
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
header("Pragma: public");
?>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>IMS, PT. Indoproc v1.0.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>
<body>
<div>

<table>
<tr>
<td>
<img width="200" height="" src="<?= base_url()?>assets/img/logo.png"  alt=""/>
<br>
<br>
<br>
</td>
<td>
</td>

<td></td>
<td></td>
<td colspan="3" align="left"  >
<strong><h3>DELIVERY ORDER</h3></strong>
</td>

</tr>
</table>
PT.Inkomaro Indoproc Solusi<br>
Ruko Gading Bukit Indah, Blok RA No.10<br>
Jl. Bukit Gading Raya, Kelapa Gading - Jakarta Utara<br>
Tlp. No 021-40079588<br>
<br>
 <table>
 <?php foreach ($listorderselect->result() as $rowa) { ?>
  <tr>
    <td>Client</td>
    <td>:</td>
	<td valign="top" align="left" colspan="2"><?= $rowa->nm_client?></td>
	
	<td>Date Order</td>
    <td>:</td>
	<td valign="top" align="left"><?= $rowa->cdate?></td>
	<td></td>
	
  </tr>
  <tr>
    <td>Phone</td>
    <td>:</td>
	<td valign="top" align="left" colspan="2"><?= $rowa->tlp_client?></td>
	
	<td>ID Outbound</td>
    <td>:</td>
	<? $p = strlen($rowa->id_outbound); 
		if($p == 1){
			$id = "00000".$rowa->id_outbound;
		}elseif($p == 2){
			$id = "0000".$rowa->id_outbound;
		}elseif($p == 3){
			$id = "000".$rowa->id_outbound;
		}elseif($p == 4){
			$id = "00".$rowa->id_outbound;
		}elseif($p == 5){
			$id = "0".$rowa->id_outbound;
		}elseif($p == 6){
			$id = $rowa->id_outbound;
		}
	?>
	<td valign="top" align="left">DO<? echo date_format(date_create($rowa->cdate),"y");?>-<?= $id?></td>
	<td></td>
	
  </tr>
  <tr>
	<td>Attn</td>
    <td>:</td>
	<td valign="top" align="left" colspan="2"></td>
	
    <td>Currency</td>
    <td>:</td>
	<td valign="top" align="left">IDR</td>
	<td></td>
	
	
  </tr>
  <tr>
	
    <td valign="top">Address</td>
    <td valign="top">:</td>
	<td valign="top" align="left" colspan="2"><?= $rowa->addr_client?></td>
	
	<td>No. PO</td>
	<td>:</td>
	<td><?= $rowa->no_po?></td>
	<td></td>
	
  </tr>
 
</table> 
<br>

<table border="1" width="100%" >
    <thead>
    <thead>
        <tr>
			<th></th>
            <th>No.</th>
            
            <th>KD Barang</th>
            <th>Nama Barang</th>
			
            <th>Uom</th>
			<th colspan="2">Qty</th>
			
            
            
            
            
        </tr>
    </thead>
    <tbody>
	<? $qty = 0;
	$harga = 0;
	$no = 1;
	?>
    <?php foreach ($listorderdetail->result() as $rows) { ?>
        <tr>
            <td></td>
			<td valign="top" align="left"><?= $no?></td>
            
            <td valign="top" align="left"><?= $rows->kd_barang?></td>
            <td valign="top" align="left"><?= $rows->nm_barang?></td>
            
            <td valign="top" align="center"><?= $rows->nm_uom?></td>
			<td valign="top" align="right" colspan="2"><?= $rows->qty?></td>
            
			
			
           
        </tr>
		<? 	$no = $no + 1;
			$qty = $qty + $rows->qty;
			
		?>
    <? } ?>
	
	<tr>
            <th></th>
            <th colspan="4">Grand Total</th>
            
                     
			<th  valign="top" align="right" colspan="2"><?= $qty ?></th>
            
            
            
      </tr>
    </tbody>
    
</table>
<table border="0">
  <tbody>
    <tr>
      
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	
    <tr>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td colspan="3" align="center">Diterbitkan Oleh,</td>
      <td align="center">Dikirim Oleh,</td>
      <td>&nbsp;</td>
      <td colspan="2" align="center">Diterima Oleh,</td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      <td align="center">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="3" align="center"><?= $rowa->nm_user?></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3" align="center">&nbsp;</td>
      </tr>
    <tr>
      <td colspan="3" align="center">&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3" align="center"></td>
      </tr>
  </tbody>
</table>
<? } ?>



</div>
</body>
</html>
<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attaachment; filename=cetakorder.xls");
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

<img width="200" height="" src="<?= base_url()?>assets/img/logo.png"  alt=""/><br>
<br>
<br>

PT.Inkomaro Indoproc Solusi<br>
Ruko Gading Bukit Indah, Blok RA No.10<br>
Jl. Bukit Gading Raya, Kelapa Gading - Jakarta Utara<br>
Tlp. No 021-40079588<br>
<br>
<strong>PURCHASE ORDER</strong>
 <table>
 <?php foreach ($listorderselect->result() as $rowa) { ?>
  <tr>
    <td>Supplier</td>
    <td>:</td>
	<td valign="top" align="left"><?= $rowa->nm_supplier?></td>
	<td></td>
	<td>Date Order</td>
    <td>:</td>
	<td valign="top" align="left"><?= $rowa->cdate?></td>
	<td></td>
	
  </tr>
  <tr>
    <td>Phone</td>
    <td>:</td>
	<td valign="top" align="left"><?= $rowa->tlp_supplier?></td>
	<td></td>
	<td>ID Order</td>
    <td>:</td>
	<td valign="top" align="left"><?= $rowa->id_order?></td>
	<td></td>
	
  </tr>
  <tr>
	<td>Attn</td>
    <td>:</td>
	<td valign="top" align="left"><?= $rowa->pic_supplier?></td>
	<td></td>
    <td>Currency</td>
    <td>:</td>
	<td valign="top" align="left">IDR</td>
	<td></td>
	
	
  </tr>
  <tr>
	
    <td valign="top">Address</td>
    <td valign="top">:</td>
	<td valign="top" align="left"><?= $rowa->addr_supplier?></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	
  </tr>
 
</table> 
<br>
<table border="1" >
    <thead>
    <thead>
        <tr>
            <th>No.</th>
            
            <th>KD Barang</th>
            <th>Nama Barang</th>
			
            <th>Uom</th>
			<th>Qty</th>
			<th>Discount</th>
            <th>Harga</th>
			
			<th>Sub Total Harga</th>
            
            
            
        </tr>
    </thead>
    <tbody>
	<? $qty = 0;
	$harga = 0;
	$no = 1;
	?>
    <?php foreach ($listorderdetail->result() as $rows) { ?>
        <tr>
            <td valign="top" align="left"><?= $no?></td>
            
            <td valign="top" align="left"><?= $rows->kd_barang?></td>
            <td valign="top" align="left"><?= $rows->nm_barang?></td>
            
            <td valign="top" align="left"><?= $rows->nm_uom?></td>
			<td valign="top" align="center"><?= $rows->qty?></td>
            
			<td valign="top" align="right"><?= $rows->discount?></td>
			<td valign="top" align="right"><?= number_format($rows->price,0,'.',',');?></td>
			<td valign="top" align="right"><?= number_format($rows->qty * ( $rows->price - $rows->discount),0,'.',',');?></td>
           
        </tr>
		<? 	$no = $no + 1;
			$qty = $qty + $rows->qty;
			$harga = $harga + ($rows->qty * ($rows->price - $rows->discount));
		?>
    <? } ?>
	<tr>
	  <th colspan="5">PPN <?= $rowa->ppn?> %</th>
	  <th>&nbsp;</th>
	  <th>&nbsp;</th>
	  <th  valign="top" align="right"><?= number_format($rowa->ppn * $harga / 100,0,'.',',');?></th>
	  </tr>
	<tr>
            
            <th colspan="5">Grand Total</th>
            
            
			<th></th>
            <th>&nbsp;</th>
			<th  valign="top" align="right"><?= number_format($harga + ( $rowa->ppn * $harga / 100),0,'.',',');?></th>
            
            
            
      </tr>
    </tbody>
    
</table>
<table border="0">
  <tbody>
    <tr>
      <th>TERM &amp; CONDITION</th>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<tr>
      <td>ETA</td>
      <td colspan="7">: <?= $rowa->eta?></td>
      </tr>
    
    <tr>
      <td>Payment</td>
      <td colspan="7">: <?= $rowa->methodpay?></td>
      </tr>
    <tr>
      <td>Delivery</td>
      <td colspan="7">: <?= $rowa->delivery?></td>
      </tr>
    <tr>
      <td>Waranty</td>
      <td colspan="7">: <?= $rowa->waranty?></td>
      </tr>
    <tr>
      <td>Reference</td>
      <td colspan="7">: <?= $rowa->reference?></td>
      </tr>
    <tr>
      <td>Remark</td>
      <td colspan="7" rowspan="2" valign="top">: <?= $rowa->note?></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td colspan="3" align="center">Diterbitkan Oleh,</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3" align="center">Disetujui Oleh,</td>
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
      <td colspan="3" align="center"></td>
      </tr>
    <tr>
      <td colspan="3" align="center">Sourcing Specialist</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3" align="center">Mgr. Sourcing</td>
      </tr>
  </tbody>
</table>
<? } ?>



</div>
</body>
</html>
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
<td>
</td>
<td>
</td>
<td colspan="4" align="left"  >
<strong><h3>PURCHASE ORDER</h3></strong>
</td>

</tr>
</table>
<table>
<tr>
<td colspan="5">
PT.Inkomaro Indoproc Solusi
</td></tr>
<tr>
<td colspan="5">
Ruko Gading Bukit Indah, Blok RA No.10
</td></tr>
<td colspan="5">
Jl. Bukit Gading Raya, Kelapa Gading - Jakarta Utara
</td></tr>
<td colspan="5">
Tlp. No 021-40079588
</td></tr>



</table>
<br>

 <table>
 <?php foreach ($listorderselect->result() as $rowa) { ?>
  <tr>
    <td>_</td>
	<td>Supplier</td>
    
	<td valign="top" align="left" colspan="2">: <?= $rowa->nm_supplier?></td>
	
	<td colspan="2">Date Order</td>
    
	<td valign="top" align="left" colspan="2">: <? echo date_format(date_create($rowa->cdate),"Y-m-d");?></td>
	<td></td>
	
  </tr>
  <tr>
	<td></td>
    <td>Phone</td>
    
	<td valign="top" align="left" colspan="2">: <?= $rowa->tlp_supplier?></td>
	
	<td colspan="2">ID Order</td>
    <? $p = strlen($rowa->id_order); 
		if($p == 1){
			$id = "00000".$rowa->id_order;
		}elseif($p == 2){
			$id = "0000".$rowa->id_order;
		}elseif($p == 3){
			$id = "000".$rowa->id_order;
		}elseif($p == 4){
			$id = "00".$rowa->id_order;
		}elseif($p == 5){
			$id = "0".$rowa->id_order;
		}elseif($p == 6){
			$id = $rowa->id_order;
		}
	?>
	<td valign="top" align="left" colspan="3">: PO<? echo date_format(date_create($rowa->cdate),"y");?>-<?= $id?></td>
	
  </tr>
  <tr>
	<td></td>
	<td>Attn</td>
    
	<td valign="top" align="left" colspan="2">: <?= $rowa->pic_supplier?></td>
	
    <td colspan="2">Currency</td>
    
	<td valign="top" align="left" colspan="2">: IDR</td>
	<td></td>
	
	
  </tr>
  <tr>
	<td></td>
    <td valign="top">Address</td>
    
	<td valign="top" align="left" colspan="2">: <?= $rowa->addr_supplier?></td>
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
            <th></th>
			<th>No.</th>
            
            <th>KD Barang</th>
            <th>Nama Barang</th>
			
            <th>Uom</th>
			<th>Qty</th>
			<th>Disc</th>
            <th>Harga</th>
			
			<th>Total Harga</th>
            
            
            
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
	<? for($i = $no; $i < 14; $i++){ ?>
	  <tr>
	  <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
	  </tr>
	  <? } ?>
	<tr>
	<th></th>
	  <th colspan="7">PPN <?= $rowa->ppn?> %</th>
	  <th  valign="top" align="right"><?= number_format($rowa->ppn * $harga / 100,0,'.',',');?></th>
	  </tr>
	<tr>
            <th></th>
            <th colspan="7">Grand Total </th>
            
            
			<th  valign="top" align="right"><?= number_format($harga + ( $rowa->ppn * $harga / 100),0,'.',',');?></th>
            
            
            
      </tr>
	  
    </tbody>
    
</table>
<table border="0">
  <tbody>
    <tr>
		<td></td>
      <th colspan="2">TERM &amp; CONDITION</th>
      
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
	<tr>
	<td></td>
      <td colspan="2">ETA</td>
      <td colspan="5">: <?= $rowa->eta?></td>
      </tr>
    
    <tr>
		<td></td>
      <td colspan="2">Payment</td>
      <td colspan="5">: <?= $rowa->methodpay?></td>
      </tr>
    <tr>
	<td></td>
      <td colspan="2">Delivery</td>
      <td colspan="5">: <?= $rowa->delivery?></td>
      </tr>
    <tr>
		<td></td>
      <td colspan="2">Waranty</td>
      <td colspan="5">: <?= $rowa->waranty?></td>
      </tr>
    <tr>
		<td></td>
      <td colspan="2">Reference</td>
      <td colspan="5">: <?= $rowa->reference?></td>
      </tr>
    <tr>
		<td></td>
      <td colspan="2">Remark</td>
      <td colspan="5" rowspan="2" valign="top">: <?= $rowa->note?></td>
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
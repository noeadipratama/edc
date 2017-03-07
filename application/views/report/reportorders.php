<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attaachment; filename=reportorder.xls");
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

 <table>
  <tr>
    <td>Date Order</td>
    <td>:</td>
	<td></td>
	<td></td>
	<td>Supplier</td>
    <td>:</td>
	<td></td>
	<td></td>
  </tr>
  <tr>
    <td>ID Order</td>
    <td>:</td>
	<td></td>
	<td></td>
	<td>Phone</td>
    <td>:</td>
	<td></td>
	<td></td>
  </tr>
  <tr>
    <td>Currency</td>
    <td>:</td>
	<td></td>
	<td></td>
	<td>Attn</td>
    <td>:</td>
	<td></td>
	<td></td>
  </tr>
  <tr>
    <td>PIC</td>
    <td>:</td>
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
            <th>ID Order Detail</th>
            <th>KD Barang</th>
            <th>Nama Barang</th>
            <th>Uom</th>
			<th>Qty</th>
            <th>Harga</th>
			<th>Sub Total Harga</th>
            
            
            
        </tr>
    </thead>
    <tbody>
	<? $qty = 0;
	$harga = 0;
	$no = 1;
	?>
    <?php foreach ($listorder->result() as $rows) { ?>
        <tr>
            <td valign="top" align="left"><?= $no?></td>
            <td valign="top" align="left"><?= $rows->id_order_detail?></td>
            <td valign="top" align="left"><?= $rows->kd_barang?></td>
            <td valign="top" align="left"><?= $rows->nm_barang?></td>
            
            <td valign="top" align="left"><?= $rows->nm_uom?></td>
			<td valign="top" align="left"><?= $rows->qty?></td>
            <td valign="top" align="left"><?= $rows->price?></td>
			<td valign="top" align="left"><?= $rows->qty * $rows->price?></td>
           
        </tr>
		<? 	$no = $no + 1;
			$qty = $qty + $rows->qty;
			$harga = $harga + ($rows->qty * $rows->price);
		?>
    <? } ?>
	<tr>
            
            <th colspan="5">Grand Total</th>
            
            
			<th><?= $qty?></th>
            <th></th>
			<th><?= $harga?></th>
            
            
            
        </tr>
    </tbody>
    
</table>


</div>
</body>
</html>
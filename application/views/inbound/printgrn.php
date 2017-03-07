<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attaachment; filename=cetagrn.xls");
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
<td colspan="5" align="left"  >
<strong><h3>GOOD RECEIVE NOTE</h3></strong>
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
    <td></td>
   
  </tr>
  <tr>
    <td>Supplier</td>
    <td>:</td>
	<td valign="top" align="left"><?= $rowa->nm_supplier?></td>
	<td></td>
	<td>Date GRN</td>
    <td>:</td>
	<td valign="top" align="left"><?= $rowa->cdate?></td>
	<td></td>
	
  </tr>
  <tr>
    <td>Phone</td>
    <td>:</td>
	<td valign="top" align="left"><?= $rowa->tlp_supplier?></td>
	<td></td>
	<td>ID GRN</td>
    <td>:</td>
	<td valign="top" align="left"><?= $rowa->id_inbound?></td>
	<td></td>
	
  </tr>
  <tr>
	<td>Attn</td>
    <td>:</td>
	<td valign="top" align="left"><?= $rowa->pic_supplier?></td>
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
            
			
			
           
        </tr>
		
    <? } ?>
	
	
    </tbody>
    
</table>
<table border="0">
  <tbody>
    
    <tr>
      <td>&nbsp;</td>
      </tr>
    <tr>
      <td colspan="3" align="center">Diterbitkan Oleh,</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3" align="center">Dikirim Oleh,</td>
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
      <td colspan="3" align="center">Penerima</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3" align="center">Pengirim</td>
      </tr>
  </tbody>
</table>
<? } ?>



</div>
</body>
</html>
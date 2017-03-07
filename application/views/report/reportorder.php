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


<p>PT. Indoproc</p>
<p >Data Order  <?= $tgl_awal ?> s/d <?= $tgl_akhir ?>   </p>
<table border="1" >
    <thead>
        <thead>
        <tr>
            
            <th>ID Order Detail</th>
            <th>ID Order</th>
            <th>Supplier</th>
			<th>Type Pay</th>
			<th>Payment</th>
            <th>KD Barang</th>
            <th>Nama Barang</th>
            <th>Uom</th>
			<th>Qty</th>
            <th>Harga</th>
			<th>Total Harga</th>
            <th>Tanggal Pembuatan</th>
            <th>User</th>
			<th>Tanggal Pembayaran</th>
            
            
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listorder->result() as $rows) { ?>
        <tr>
            
            <td valign="top" align="left"><?= $rows->id_order_detail?></td>
            <td valign="top" align="left"><?= $rows->id_order?></td>
            <td valign="top" align="left"><?= $rows->nm_supplier?></td>
            <td valign="top" align="left"><?= $rows->pay?></td>
			<td valign="top" align="left"><?= $rows->methodpay?></td>
			<td valign="top" align="left"><?= $rows->kd_barang?></td>
            <td valign="top" align="left"><?= $rows->nm_barang?></td>
            
            <td valign="top" align="left"><?= $rows->nm_uom?></td>
			<td valign="top" align="left"><?= $rows->qty?></td>
            <td valign="top" align="left"><?= $rows->price?></td>
			<td valign="top" align="left"><?= $rows->qty * $rows->price?></td>
            <td valign="top" align="left"><?= $rows->sdate?></td>
            <td valign="top" align="left"><?= $rows->nm_user?></td>
			<td valign="top" align="left"><?= $rows->pdate?></td>
            
            
        </tr>
    <? } ?>
    </tbody>
    
</table>


</div>
</body>
</html>
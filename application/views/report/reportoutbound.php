<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attaachment; filename=reportoutbound.xls");
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
<p >Data Outbound  <?= $tgl_awal ?> s/d <?= $tgl_akhir ?>   </p>
<table border="1" >
    <thead>
        <thead>
        <tr>
            <th>ID Out Alloc</th>
            <th>ID Out Detail</th>
            <th>ID Out</th>
            <th>ID Stock</th>
            <th>No. PO</th>
            <th>No. DO</th>
            <th>Client</th>
            <th>Location</th>
            <th>KD Barang</th>
            <th>Nm Barang</th>
            <th>Qty</th>
            <th>Uom</th>
            <th>Price</th>
            <th>Sales</th>
            <th>Tanggal</th>
            <th>User</th>
            
            
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listoutbound->result() as $rows) { ?>
        <tr>
            <td valign="top" align="left"><?= $rows->id_outbound_allocation?></td>
            <td valign="top" align="left"><?= $rows->id_outbound_detail?></td>
            <td valign="top" align="left"><?= $rows->id_outbound?></td>
            <td valign="top" align="left"><?= $rows->id_stock?></td>
            <td valign="top" align="left"><?= $rows->no_po?></td>
            <td valign="top" align="left"><?= $rows->no_do?></td>
            <td valign="top" align="left"><?= $rows->nm_client?></td>
            <td valign="top" align="left"><?= $rows->nm_location?></td>
            <td valign="top" align="left"><?= $rows->kd_barang?></td>
            <td valign="top" align="left"><?= $rows->nm_barang?></td>
            <td valign="top" align="left"><?= $rows->qty?></td>
            <td valign="top" align="left"><?= $rows->nm_uom?></td>
            <td valign="top" align="left"><?= $rows->price?></td>
            <td valign="top" align="left"><?= $rows->sales?></td>
            <td valign="top" align="left"><?= $rows->sdate?></td>
            <td valign="top" align="left"><?= $rows->suser?></td>
           
            
        </tr>
    <? } ?>
    </tbody>
    
</table>


</div>
</body>
</html>
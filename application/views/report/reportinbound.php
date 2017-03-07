<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attaachment; filename=reportinbound.xls");
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
<p >Data Inbound  <?= $tgl_awal ?> s/d <?= $tgl_akhir ?>   </p>
<table border="1" >
    <thead>
        <thead>
        <tr>
         
            <th>ID In Detail</th>
            <th>ID In</th>
            <th>ID Order</th>
            <th>Ext. No</th>
        
            <th>Supplier</th>
            <th>Warehouse</th>
            <th>Tanggal</th>
            <th>User</th>
            <th>KD Barang</th>
            <th>Barang</th>
            <th>Qty</th>
            <th>Uom</th>
            <th>Price</th>
            <th>Location</th>
            
            
        </tr>
    </thead>
    <tbody>
    <?php foreach ($listinbound->result() as $rows) { ?>
        <tr>
         
            <td valign="top" align="left"><?= $rows->id_inbound_detail?></td>
            <td valign="top" align="left"><?= $rows->id_inbound?></td>
            <td valign="top" align="left"><?= $rows->id_order?></td>
            <td valign="top" align="left"><?= $rows->ext_no?></td>
            <td valign="top" align="left"><?= $rows->nm_supplier?></td>
            <td valign="top" align="left"><?= $rows->nm_warehouse?></td>
            <td valign="top" align="left"><?= $rows->sdate?></td>
            <td valign="top" align="left"><?= $rows->nm_user?></td>
            <td valign="top" align="left"><?= $rows->kd_barang?></td>
            <td valign="top" align="left"><?= $rows->nm_barang?></td>
            <td valign="top" align="left"><?= $rows->qty?></td>
            <td valign="top" align="left"><?= $rows->nm_uom?></td>
            <td valign="top" align="left"><?= $rows->price?></td>
            <td valign="top" align="left"><?= $rows->nm_location?></td>
           
            
        </tr>
    <? } ?>
    </tbody>
    
</table>


</div>
</body>
</html>
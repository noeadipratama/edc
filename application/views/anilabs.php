<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Anil Labs - Codeigniter mail templates</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
<div>
   <div style="font-size: 26px;font-weight: 700;letter-spacing: -0.02em;line-height: 32px;color: #41637e;font-family: sans-serif;text-align: center" align="center" id="emb-email-header"><img style="border: 0;-ms-interpolation-mode: bicubic;display: block;Margin-left: auto;Margin-right: auto;max-width: 152px" src="http://www.anil2u.info/wp-content/uploads/2013/09/anil-kumar-panigrahi-blog.png" alt="" width="152" height="108">
   </div>
<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px">Hey </p>
<table class="table table-striped table-bordered table-hover" id="dataTables-example">
    <thead>
        <tr>
            <th>Status</th>
            <th>ID BA</th>
            <th>No. BA</th>
            <th>Date</th>
            <th>KD Pelanggan</th>
            <th>Nama Pelanggan</th>
            <th>KD Pelanggaran</th>
    	</tr>
    </thead>
    <tbody>
    <?php foreach ($listba->result() as $rows) { ?>
        <tr>
        	<td><? if ($rows->status == 1){echo "New";} elseif ($rows->status == 2){echo "P2";} elseif ($rows->status == 3){echo "P3";} elseif ($rows->status == 4){echo "SP1";} elseif ($rows->status == 5){echo "SP2";}?></td>
            <td><?= $rows->id_ba?></td>
            <td nowrap="">BA : <?= $rows->no_ba?><br>P2 : <?= $rows->no_p2?><br>P3 : <?= $rows->no_p3?><br>SP1 : <?= $rows->no_sp1?><br>SP2 : <?= $rows->no_sp2?></td>
            <td nowrap=""><?= $rows->badate?><br><?= $rows->p2date?><br><?= $rows->p3date?><br><?= $rows->sp1date?><br><?= $rows->sp2date?></td>
            <td><?= $rows->kd_pelanggan?></td>
            <td><?= $rows->nm_pelanggan?></td>
            <td><?= $rows->kd_pelanggaran?></td>
        </tr>
    <? } ?>
    </tbody>   
</table>

<p style="Margin-top: 0;color: #565656;font-family: Georgia,serif;font-size: 16px;line-height: 25px;Margin-bottom: 25px"> I am  Anil Kumar Panigrahi , Founder of Anil Labs. and This is mail demo of How to send email using HTML templates in Codeigniter </p>
</div>
</body>
</html>
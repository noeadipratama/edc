<!DOCTYPE html>
<html>
  <head>
    <?= $this->load->view('head'); ?>

  </head>

  <body class="sidebar-mini wysihtml5-supported skin-red-light">
    <div class="wrapper">

      <?= $this->load->view('nav'); ?>
      <?= $this->load->view('menu_groups'); ?>
      

      <!-- Container -->
      <div class="content-wrapper">
        <!-- Judul Halaman -->
        <section class="content-header">
          <h1>
            Payment
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>Marks</th>
                                            <th>Options</th>
                                            <th>ID Order</th>
											<th>Supplier</th>
											<th>Payment Type</th>
											<th>Payment</th>
                                            <th>Paid Date</th>
											<th>Paid Note</th>
											<th>PPN(%)</th>
											<th>PPN(Amount)</th>
											<th>Amount</th>
											<th >Total_Amount</th>
											<th>Note</th>
                                            <th>Cdate</th>
                                            <th>Cuser</th>

                                            
                                       
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listpayment->result() as $rows) {
                                                      ?>
                                                        <tr>
														<? if($rows->payment == 1){
															$icon = "fa-thumbs-o-up";
															$colour = "green";
														}else{
															$icon = "fa-clock-o";
															$colour = "yellow";
														}?>
														<td><span class="info-box-icon bg-<?= $colour?>"><i class="fa <?= $icon?>"></i></span></td>
                                                        <td nowrap=""><a href="payment/formupdate/<?= $rows->id_order?>">
                                                                                    <button class="btn btn-warning" >
                                                                                        Update
                                                                                    </button></a>
                                                                                    <a href="payment/detail/<?= $rows->id_order?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Detail
                                                                                    </button></a>
                                                                                    <? if($rows->payment == 1){ ?>
																					<a href="payment/send/<?= $rows->id_order?>/<?= $rows->payment?>">
                                                                                    <button class="btn btn-success" >
                                                                                        Close
                                                                                    </button></a>
																					<? } ?>

                                                                                </td>
		<? $p = strlen($rows->id_order); 
		if($p == 1){
			$id = "00000".$rows->id_order;
		}elseif($p == 2){
			$id = "0000".$rows->id_order;
		}elseif($p == 3){
			$id = "000".$rows->id_order;
		}elseif($p == 4){
			$id = "00".$rows->id_order;
		}elseif($p == 5){
			$id = "0".$rows->id_order;
		}elseif($p == 6){
			$id = $rows->id_order;
		}
	?>
                                                          <td nowrap>PO<? echo date_format(date_create($rows->cdate),"y");?>-<?= $id?></td>
                                                          <td><?= $rows->nm_supplier?></td>
                                                          <td><?= $rows->pay?></td>
														  <td><?= $rows->methodpay?></td>
														  <td nowrap><?= $rows->pdate?></td>
														  <td><?= $rows->pnote?></td>
														  
														  <td><?= $rows->ppn?></td>
														  <td align="right"><?= number_format($rows->totsum * $rows->ppn / 100,0,'.',',');?></td>
														  <td align="right"><?= number_format($rows->totsum,0,'.',',');?></td>
														  <td align="right" nowrap><?= number_format(($rows->totsum * $rows->ppn / 100)+$rows->totsum,0,'.',',');?></td>
                                                          <td><?= $rows->note?></td>
														  <td><?= $rows->cdate?></td>
                                                          <td><?= $rows->nm_user?></td>
                                                                               
                                                                                
                                                        </tr>
                                    <? } ?>
                  </tbody>  
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->

    
        </section><!-- /.content -->
        
      </div><!-- /.content-wrapper -->
      

     
    
    </div><!-- ./wrapper -->

    <?= $this->load->view('basic_js'); ?>
    <!-- Additional JS -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                "scrollY": 300,
				"scrollX": true
        });
    });
    </script>
  </body>
</html>

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
            SO List
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
                                <table class="table table-striped table-bsoed table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Options</th>
                                            <th>ID SO</th>
                                            <th>Client</th>
											<th>ETD</th>
											<th>PPN(%)</th>
											<th>Type Pay</th>
											<th>Payment</th>
											
											<th>No. PO</th>
											
                                            <th>Remarks</th>
                                            <th>Cdate</th>
                                            <th>Cuser</th>

                                            
                                       
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listso->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                        <td nowrap="">
                                                                                    <a href="<?= base_url()?>index.php/so/detail_list/<?= $rows->id_so?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Detail
                                                                                    </button></a>
																				

                                                                                </td>
                                                          <? $p = strlen($rows->id_so); 
		if($p == 1){
			$id = "00000".$rows->id_so;
		}elseif($p == 2){
			$id = "0000".$rows->id_so;
		}elseif($p == 3){
			$id = "000".$rows->id_so;
		}elseif($p == 4){
			$id = "00".$rows->id_so;
		}elseif($p == 5){
			$id = "0".$rows->id_so;
		}elseif($p == 6){
			$id = $rows->id_so;
		}
	?>
                                                          <td nowrap>SO<? echo date_format(date_create($rows->cdate),"y");?>-<?= $id?></td>
                                                                                <td><?= $rows->nm_client?></td>
                                                          <td nowrap><?= $rows->etd?></td>
														  <td nowrap><?= $rows->ppn?></td>
														  <td><?= $rows->pay?></td>
														  <td><?= $rows->methodpay?></td>
												
														  <td><?= $rows->no_po?></td>
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
                "scrollX": true
        });
    });
    </script>
  </body>
</html>

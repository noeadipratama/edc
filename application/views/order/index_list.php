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
            Order List
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
                                            <th>Options</th>
                                            <th>ID order</th>
                                            <th>Supplier</th>
											<th>ETA</th>
											<th>PPN</th>
											<th>Type Payment</th>
											<th>Payment</th>
											<th>Delivery</th>
											<th>Waranty</th>
											<th>Reference</th>
                                            <th>Remarks</th>
                                            <th>Cdate</th>
                                            <th>Cuser</th>

                                            
                                       
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listorder->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                        <td nowrap="">
                                                                                    <a href="<?= base_url()?>index.php/order/detail_list/<?= $rows->id_order?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Detail
                                                                                    </button></a>
																				<a href="<?= base_url()?>index.php/order/printorder/<?= $rows->id_order?>">
                                                                                    <button class="btn btn-success" >
                                                                                        Print
                                                                                    </button></a>

                                                                                </td>
                                                          <td><?= $rows->id_order?></td>
                                                                                <td><?= $rows->nm_supplier?></td>
                                                          <td><?= $rows->eta?></td>
														  <td><?= $rows->ppn?></td>
														  <td><?= $rows->pay?></td>
														  <td><?= $rows->methodpay?></td>
														  <td><?= $rows->delivery?></td>
														  <td><?= $rows->waranty?></td>
														  <td><?= $rows->reference?></td>
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
				"scrollX": true,
				order: [[ 1, 'desc' ]]
        });
    });
    </script>
  </body>
</html>

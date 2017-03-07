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
            Payment Detail, ID Order: <?= $id_order?>
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="<?= base_url()?>index.php/order/printorder/<?= $id_order?>">
                                                                                    <button class="btn btn-success" >
                                                                                        Print
                                                                                    </button></a>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Options</th>
                                            <th>ID Order Detail</th>
                                            <th>KD Barang</th>
											<th>Nama Barang</th>
											<th>Uom</th>                                           
											<th>Qty</th>
                                            <th>Harga @</th>
											<th>Total Harga</th>
                                            <th>Cdate</th>
                                            <th>Cuser</th>

                                            
                                       
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listpaymentdetail->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                        <td nowrap="">
																	<a href="<?= base_url()?>index.php/order/FormUpdatedetail/<?= $rows->id_order_detail?>">
                                                                                    <button class="btn btn-warning" >
                                                                                        Update
                                                                                    </button></a>
                                                                                </td>
                                                            <td><?= $rows->id_order_detail?></td>
                                                            <td><?= $rows->kd_barang?></td>
															<td><?= $rows->nm_barang?></td>
															<td><?= $rows->nm_uom?></td>
                                                            <td><?= $rows->qty?></td>
                                                            <td><?= $rows->price?></td>
															<td><?= $rows->price*$rows->qty?></td>
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

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
            Stock
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
                                           
                                            
                                            <th>KD Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Qty</th>
											<th>Harga Akhir</th>
											<th>Min Stock</th>
											<th>Selisih Min Stock</th>
											<th>Uom</th>
                                           
                                       
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($liststock->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                        
                                                         
                                                            <td><?= $rows->kd_barang?></td>
                                                            <td><?= $rows->nm_barang?></td>
                                                            <td><?= $rows->qty?></td>
															<td align="right"><?= number_format($rows->price,0,'.',',');?></td>
															<td><?= $rows->min_stock?></td>
															<td><? if(($rows->qty - $rows->min_stock) < 0) {echo $rows->qty - $rows->min_stock;}else{echo 0;} ?></td>
															
															<td><?= $rows->nm_uom?></td>
                                                           
                                                               
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
                "scrollX": true,
				order: [[ 4, 'asc' ]]
				
        });
    });
    </script>
  </body>
</html>

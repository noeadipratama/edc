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
            Inbound Detail, ID Inbound: <?= $id_inbound?>
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="<?= base_url()?>index.php/inbound/printgrn/<?= $id_inbound?>">
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
                                            <th>ID Inbound Detail</th>
                                            <th>KD Barang</th>
											<th>Nama Barang</th>
                                            <th>Qty</th>
                                            <th>Uom</th>
                                            <th>Price @</th>
                                            <th>Location</th>
                                            <th>Cdate</th>
                                            <th>Cuser</th>

                                            
                                       
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listinbounddetail->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                        <td nowrap="">
                                                                                </td>
                                                            <td><?= $rows->id_inbound_detail?></td>
                                                            <td><?= $rows->kd_barang?></td>
															<td><?= $rows->nm_barang?></td>
                                                            <td><?= $rows->qty?></td>
                                                            <td><?= $rows->nm_uom?></td>
                                                            <td><?= $rows->price?></td>
                                                            <td><?= $rows->nm_location?></td>
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

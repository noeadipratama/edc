<!DOCTYPE html>
<html>
  <head>
    <?= $this->load->view('head'); ?>

  </head>

  <body class="sidebar-mini wysihtml5-supported skin-blue-light sidebar-collapse">
    <div class="wrapper">

      <?= $this->load->view('nav'); ?>
      <?= $this->load->view('menu_groups'); ?>
      

      <!-- Container -->
      <div class="content-wrapper">
        <!-- Judul Halaman -->
        <section class="content-header">
          <h1>
            pensiun
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update pensiun
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listpensiunselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('pensiun/Update'); ?>
                                          
                                            <div class="form-group">
                                            <label>No Pensiun</label>
                                            <input type="text" name="no_pensiun" readonly class="form-control" placeholder="No Pensiun" value="<?= $rows->no_pensiun?>">
                                            </div>

                                            <div class="form-group">
                                            <label>No Rekening</label>
                                            <input type="text" name="no_rekening" class="form-control" placeholder="No Rekening" value="<?= $rows->no_rekening?>">
                                            </div>

                                            <div class="form-group">
                                            <label>No KTP</label>
                                            <input type="text" name="no_ktp" class="form-control" placeholder="No KTP" value="<?= $rows->no_ktp?>">
                                            </div>                                            

                                            <div class="form-group">
                                            <label>Nama Pensiun</label>
                                            <input type="text" name="nm_pensiun" class="form-control" placeholder="Name Pensiun" value="<?= $rows->nm_pensiun?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Tgl Lahir</label>
                                            <input type="text" name="tgl_lahir_pensiun" class="form-control" placeholder="YYYY-MM-DD" value="<?= $rows->tgl_lahir_pensiun?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Alamat Pensiun</label>
                                            <input type="text" name="alamat_pensiun" class="form-control" placeholder="Alamat Pensiun" value="<?= $rows->alamat_pensiun?>">
                                            </div>

                                            <div class="form-group">
                                            <label>No Telp</label>
                                            <input type="text" name="no_tlp" class="form-control" placeholder="No Tlp" value="<?= $rows->no_tlp?>">
                                            </div>

                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/pensiun"><input type="button" value="Cancel" class="btn btn-default"></a>
                                            </div>
                                            <?php echo form_close(); ?>
                                            <? } ?>  
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


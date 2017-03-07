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
            barang
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update Barang
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listbarangselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('barang/Update'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID Barang</label>
                                            <input type="text" name="id_barang" class="form-control" placeholder="ID barang" value="<?= $rows->id_barang?>" readonly>
                                            </div>

                                            

                                            <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" name="nm_barang" class="form-control" placeholder="Nama barang" value="<?= $rows->nm_barang?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Uom</label>
                                            <select class="form-control" name="id_uom">
                                            <?php
                                                 foreach ($combobox_uom->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_uom?>" <?php if($rowmenu->id_uom == $rows->id_uom){echo "selected";} ?>  ><?= $rowmenu->nm_uom?></option>
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>

											<div class="form-group">
                                            <label>Min Stock</label>
                                            <input type="text" name="min_stock" class="form-control" placeholder="Min Stock" value="<?= $rows->min_stock?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Active</label>
                                            <select class="form-control" name="active">
                                            <option value="1" <?php if ($rows->active == 1){echo set_select('myselect', '1',TRUE);} ?> >Active</option>
                                            <option value="0" <?php if ($rows->active == 0){echo set_select('myselect', '0',TRUE);} ?> >Deactive</option>                                            
                                            </select> 
                                            </div>

                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/barang"><input type="button" value="Cancel" class="btn btn-default"></a>
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

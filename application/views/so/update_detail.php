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
            Update Detail so
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update Detail so
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listsoselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('so/Updatedetail'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID so Detail</label>
                                            <input type="text" name="id_so_detail" class="form-control" placeholder="ID so Detail" value="<?= $rows->id_so_detail?>" readonly>
											<input type="hidden" name="id_so" class="form-control" placeholder="ID so D" value="<?= $rows->id_so?>" readonly>
                                            </div>

											<div class="form-group">
                                            <label>Barang</label>
                                            <select class="form-control select2" style="width: 100%;" name="kd_barang" >
                                            <?php
                                                 foreach ($combobox_barang->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->kd_barang?>" <?php if($rowmenu->kd_barang == $rows->kd_barang){echo "selected";} ?> ><?= $rowmenu->kd_barang?> - <?= $rowmenu->nm_barang?></option>
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>

                                            <div class="form-group">
                                            <label>Qty</label>
                                            <input type="text" name="qty" class="form-control" placeholder="Qty" value="<?= $rows->qty?>" >
                                            </div>
											
											<div class="form-group">
                                            <label>Harga @</label>
                                            <input type="text" name="price" class="form-control" placeholder="Harga @" value="<?= $rows->price?>" >
                                            </div>
											
											
                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/so/detail/<?= $rows->id_so?>"><input type="button" value="Cancel" class="btn btn-default"></a>
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

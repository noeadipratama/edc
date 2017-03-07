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
            Location
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update Location
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listlocationselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('location/Update'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID location</label>
                                            <input type="text" name="id_location" class="form-control" placeholder="ID location" value="<?= $rows->id_location?>" readonly>
                                            </div>

                                          

                                            <div class="form-group">
                                            <label>Nama location</label>
                                            <input type="text" name="nm_location" class="form-control" placeholder="Nama location" value="<?= $rows->nm_location?>">
                                            </div>

                                            <div class="form-group">
                                            <label>warehouse</label>
                                            <select class="form-control" name="id_warehouse">
                                            <?php
                                                 foreach ($combobox_warehouse->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_warehouse?>" <?php if($rowmenu->id_warehouse == $rows->id_warehouse){echo "selected";} ?>  ><?= $rowmenu->nm_warehouse?></option>
                                            <?php
                                            }
                                            ?>
                                            </select> 
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
                                            <a href="<?=base_url();?>index.php/location"><input type="button" value="Cancel" class="btn btn-default"></a>
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

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
            Outbound
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update Outbound
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listoutboundselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('outbound/Update'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID Outbound</label>
                                            <input type="text" name="id_outbound" class="form-control" placeholder="ID outbound" value="<?= $rows->id_outbound?>" readonly>
                                            </div>

                                            <div class="form-group">
                                            <label>Client</label>
                                            <select class="form-control select2" style="width: 100%;" name="id_client">
                                            <?php
                                                 foreach ($combobox_client->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_client?>" <?php if($rowmenu->id_client == $rows->id_client){echo "selected";} ?>  ><?= $rowmenu->nm_client?></option>
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>
											
											<div class="form-group">
                                            <label>ID. SO</label>
                                            <input type="text" name="id_so" class="form-control" placeholder="ID. SO" value="<?= $rows->id_so?>" >
                                            </div>

                                           
                                            <div class="form-group">
                                            <label>No. PO</label>
                                            <input type="text" name="no_po" class="form-control" placeholder="No. PO" value="<?= $rows->no_po?>" >
                                            </div>
                           
                                          
                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/outbound"><input type="button" value="Cancel" class="btn btn-default"></a>
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

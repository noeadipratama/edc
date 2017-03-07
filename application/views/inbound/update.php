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
            Inbound
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update Inbound
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listinboundselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('inbound/Update'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID Inbound</label>
                                            <input type="text" name="id_inbound" class="form-control" placeholder="ID inbound" value="<?= $rows->id_inbound?>" readonly>
                                            </div>

                                            <div class="form-group">
                                            <label>Ext No.</label>
                                            <input type="text" name="ext_no" class="form-control" placeholder="Ext No." value="<?= $rows->ext_no?>" >
                                            </div>

                                            <div class="form-group">
                                            <label>ID Order</label>
                                            <input type="text" name="id_order" class="form-control" placeholder="ID Order" value="<?= $rows->id_order?>" >
                                            </div>

                                            <div class="form-group">
                                            <label>Supplier</label>
                                            <select class="form-control select2" style="width: 100%;" name="id_supplier">
                                            <?php
                                                 foreach ($combobox_supplier->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_supplier?>" <?php if($rowmenu->id_supplier == $rows->id_supplier){echo "selected";} ?>  ><?= $rowmenu->nm_supplier?></option>
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>

                                            <div class="form-group">
                                            <label>Warehouse</label>
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
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/inbound"><input type="button" value="Cancel" class="btn btn-default"></a>
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

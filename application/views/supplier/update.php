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
            Supplier
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update Supplier
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listsupplierselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('supplier/Update'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID Supplier</label>
                                            <input type="text" name="id_supplier" class="form-control" placeholder="ID supplier" value="<?= $rows->id_supplier?>" readonly>
                                            </div>

                                            
                                            <div class="form-group">
                                            <label>Nama Supplier</label>
                                            <input type="text" name="nm_supplier" class="form-control" placeholder="Nama Supplier" value="<?= $rows->nm_supplier?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Address Supplier</label>
                                            <input type="text" name="addr_supplier" class="form-control" placeholder="Address Supplier" value="<?= $rows->addr_supplier?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Telp Supplier</label>
                                            <input type="text" name="tlp_supplier" class="form-control" placeholder="Telp supplier" value="<?= $rows->tlp_supplier?>">
                                            </div>

                                            <div class="form-group">
                                            <label>PIC Supplier</label>
                                            <input type="text" name="pic_supplier" class="form-control" placeholder="PIC supplier" value="<?= $rows->pic_supplier?>">
                                            </div>
											
											<div class="form-group">
                                            <label>Email Supplier</label>
                                            <input type="text" name="email_supplier" class="form-control" placeholder="Email Supplier" value="<?= $rows->email_supplier?>">
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
                                            <a href="<?=base_url();?>index.php/supplier"><input type="button" value="Cancel" class="btn btn-default"></a>
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

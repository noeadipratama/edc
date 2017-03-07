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
            Payment
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update Payment
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listpaymentselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('payment/Update'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID order</label>
                                            <input type="text" name="id_order" class="form-control" placeholder="ID order" value="<?= $rows->id_order?>" readonly>
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
                                            <label>Tanggal Pembayaran</label>
                                            <input type="text" name="pdate" id="pdate" class="form-control" placeholder="yyyy-mm-dd" value="<?= $rows->pdate?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Payment Note</label>
                                            <input type="text" name="pnote" class="form-control" placeholder="Note" value="<?= $rows->note?>" >
                                            </div>
                           
                                          
                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/payment"><input type="button" value="Cancel" class="btn btn-default"></a>
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
	$("#pdate").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
    </script>
  </body>
</html>

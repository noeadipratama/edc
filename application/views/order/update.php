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
            Order
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update Order
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listorderselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('order/Update'); ?>
                                            
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
                                            <label>ETA</label>
                                            <input type="text" name="eta" id="eta" class="form-control" placeholder="yyyy-mm-dd" value="<?= $rows->eta?>"  >
                                            </div>
											
											<div class="form-group">
                                            <label>PPN</label>
                                            <input type="text" name="ppn" class="form-control" placeholder="PPN" value="<?= $rows->ppn?>" >
                                            </div>
											
											<div class="form-group">
                                            <label>Type Pay</label>
                                            <select class="form-control" name="pay">
                                            <option value="CA" <?php if ($rows->pay == "CA"){echo "selected";} ?> >CA</option>
                                            <option value="CREDIT" <?php if ($rows->pay == "CREDIT"){echo "selected";} ?> >CREDIT</option>                                            
                                            </select> 
                                            </div>
											
											<div class="form-group">
                                            <label>Payment</label>
                                            <input type="text" name="methodpay" class="form-control" placeholder="Payment" value="<?= $rows->methodpay?>" >
                                            </div>
											
											<div class="form-group">
                                            <label>Delivery</label>
                                            <input type="text" name="delivery" class="form-control" placeholder="Delivery" value="<?= $rows->delivery?>" >
                                            </div>
											
											<div class="form-group">
                                            <label>Waranty</label>
                                            <input type="text" name="waranty" class="form-control" placeholder="Waranty" value="<?= $rows->waranty?>" >
                                            </div>							
											
											<div class="form-group">
                                            <label>Reference</label>
                                            <input type="text" name="reference" class="form-control" placeholder="Reference" value="<?= $rows->reference?>" >
                                            </div>
											
											<div class="form-group">
                                            <label>Remarks</label>
                                            <input type="text" name="note" class="form-control" placeholder="Remarks" value="<?= $rows->note?>" >
                                            </div>
											
                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/order"><input type="button" value="Cancel" class="btn btn-default"></a>
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
	
	$("#eta").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
    </script>
  </body>
</html>

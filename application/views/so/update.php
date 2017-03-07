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
            SO
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update SO
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listsoselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('so/Update'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID SO</label>
                                            <input type="text" name="id_so" class="form-control" placeholder="ID so" value="<?= $rows->id_so?>" readonly>
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
                                            <label>ETD</label>
                                            <input type="text" name="etd" id="etd" class="form-control" placeholder="yyyy-mm-dd" value="<?= $rows->etd?>"  >
                                            </div>
											
											<div class="form-group">
                                            <label>PPN</label>
                                            <input type="text" name="ppn" id="ppn" class="form-control" placeholder="PPN" value="<?= $rows->ppn?>" >
                                            </div>
											
											
											
																						
											<div class="form-group">
                                            <label>No. PO</label>
                                            <input type="text" name="no_po" class="form-control" placeholder="No. PO" value="<?= $rows->no_po?>" >
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
                                            <label>Note</label>
                                            <input type="text" name="note" class="form-control" placeholder="Note" value="<?= $rows->note?>" >
                                            </div>
											
											
                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/so"><input type="button" value="Cancel" class="btn btn-default"></a>
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
	
	$("#etd").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
	
	//number filter
    $(document).ready(function() {
    $("#ppn").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
    });
    </script>
  </body>
</html>

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
            Update Detail Order
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update Detail Order
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listorderselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('order/Updatedetail'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID Order Detail</label>
                                            <input type="text" name="id_order_detail" class="form-control" placeholder="ID Order Detail" value="<?= $rows->id_order_detail?>" readonly>
											<input type="hidden" name="id_order" class="form-control" placeholder="ID Order D" value="<?= $rows->id_order?>" readonly>
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
                                            <input type="text" name="qty" id="qty" class="form-control" placeholder="Qty" value="<?= $rows->qty?>" >
                                            </div>
											
											<div class="form-group">
                                            <label>Harga @</label>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Harga @" value="<?= $rows->price?>" >
                                            </div>
											
											<div class="form-group">
                                            <label>Discount @</label>
                                            <input type="text" name="discount" id="discount" class="form-control" placeholder="Discount @" value="<?= $rows->discount?>" >
                                            </div>
                           
                                          
                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/order/detail/<?= $rows->id_order?>"><input type="button" value="Cancel" class="btn btn-default"></a>
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
	
	//number filter
    $(document).ready(function() {
    $("#discount, #qty, #price").keydown(function (e) {
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

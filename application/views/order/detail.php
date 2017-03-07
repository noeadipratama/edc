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
            Order Detail, ID Order: <?= $id_order?>
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!-- Button trigger modal -->
                            <button class="btn btn-primary " data-toggle="modal" data-target="#myModal">
                                Tambah Order Detail
                            </button>
							<a href="<?= base_url()?>index.php/order/printorder/<?= $id_order?>">
                                                                                    <button class="btn btn-success" >
                                                                                        Print
                                                                                    </button></a>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-order" id="myModalLabel">Form Add Order Detail</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('order/insertdetail'); ?>
                      
                                            <div class="form-group">
                                            <label>ID Order</label>
                                            <input type="text" name="id_order" class="form-control" readonly value="<?= $id_order?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Barang</label>
                                            <select class="form-control select2" style="width: 100%;" name="kd_barang" >
                                            <?php
                                                 foreach ($combobox_barang->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->kd_barang?>"  ><?= $rowmenu->kd_barang?> - <?= $rowmenu->nm_barang?></option>
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>    

                                            <div class="form-group">
                                            <label>Qty</label>
                                            <input type="text" name="qty" class="form-control" placeholder="Qty" id="qty">
                                            </div>

                                            <div class="form-group">
                                            <label>Harga @</label>
                                            <input type="text" name="price" id="price" class="form-control" placeholder="Harga">
                                            </div>
											
											<div class="form-group">
                                            <label>Discount @</label>
                                            <input type="text" name="discount" id="discount" class="form-control" placeholder="Discount">
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <input type="submit" value="Save" class="btn btn-primary">
                                        
                                            <?php echo form_close(); ?>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Options</th>
											<th>Qty Stock</th>
                                            <th>ID Order Detail</th>
                                            <th>KD Barang</th>
											<th>Nama Barang</th>
											<th>Uom</th>                                           
											<th>Qty</th>
                                            <th>Harga @</th>
											<th>Discount @</th>
											<th>Total Harga</th>
                                            <th>Cdate</th>
                                            <th>Cuser</th>

                                            
                                       
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listorderdetail->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                        <td nowrap=""><a href="<?= base_url()?>index.php/order/deletedetail/<?= $rows->id_order_detail?>/<?= $rows->id_order?>">
                                                                                    <button class="btn btn-danger" >
                                                                                        Hapus
                                                                                    </button></a>
																	<a href="<?= base_url()?>index.php/order/FormUpdatedetail/<?= $rows->id_order_detail?>">
                                                                                    <button class="btn btn-warning" >
                                                                                        Update
                                                                                    </button></a>
                                                                                </td>
															<? $qtytot = $this->model_outbound->getstock($rows->kd_barang);
                                                                $tot = $qtytot['qty'];
                                                                $style = "success";
                                                                if(empty($tot)){$tot = 0; $style = "danger";}
                                                             ?>
															<td ><a class="btn btn-<?= $style?> btn-sm">Qty SOH : <?= $tot ?>  <?= $rows->nm_uom?></a></td>
                                                            <td><?= $rows->id_order_detail?></td>
                                                            <td><?= $rows->kd_barang?></td>
															<td><?= $rows->nm_barang?></td>
															<td><?= $rows->nm_uom?></td>
                                                            <td><?= $rows->qty?></td>
                                                            <td><?= number_format($rows->price,0,'.',',');?></td>
															<td><?= number_format($rows->discount,0,'.',',');?></td>
															<td><?= number_format(($rows->price - $rows->discount)  * $rows->qty,0,'.',',');?></td>
                                                            <td><?= $rows->cdate?></td>
                                                            <td><?= $rows->nm_user?></td>
                                                                                
                                                        </tr>
                                    <? } ?>
                  </tbody>  
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                           
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

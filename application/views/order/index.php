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
                        <div class="panel-heading">
                            <!-- Button trigger modal -->
                            <button class="btn btn-primary " data-toggle="modal" data-target="#myModal">
                                Add Order
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-order" id="myModalLabel">Form Add order</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('order/insert'); ?>
                      
                    

                                            <div class="form-group">
                                            <label>Supplier</label>
                                            <select class="form-control select2" style="width: 100%;" name="id_supplier">
                                            <?php
                                                 foreach ($combobox_supplier->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_supplier?>"  ><?= $rowmenu->nm_supplier?></option>
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
                                            <option value="<?= $rowmenu->id_client?>"  ><?= $rowmenu->nm_client?></option>
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>
											
											<div class="form-group">
                                            <label>ETA</label>
                                            <input type="text" name="eta" id="eta" class="form-control" placeholder="yyyy-mm-dd"  >
                                            </div>

											<div class="form-group">
                                            <label>PPN</label>
                                            <input type="text" name="ppn" class="form-control" placeholder="PPN"  >
                                            </div>

											<div class="form-group">
											<label>Type Pay</label>
                                            <select class="form-control" name="pay">
                                            <option value="CASH" >CASH</option>
                                            <option value="CREDIT" >CREDIT</option>
                                            </select> 
                                            </div>

											<div class="form-group">
                                            <label>Payment</label>
                                            <input type="text" name="methodpay" class="form-control" placeholder="Payment"  >
                                            </div>
											
											<div class="form-group">
                                            <label>Delivery</label>
                                            <input type="text" name="delivery" class="form-control" placeholder="Delivery"  >
                                            </div>
											
											<div class="form-group">
                                            <label>Waranty</label>
                                            <input type="text" name="waranty" class="form-control" placeholder="Waranty"  >
                                            </div>							
											
											<div class="form-group">
                                            <label>Reference</label>
                                            <input type="text" name="reference" class="form-control" placeholder="Reference"  >
                                            </div>
											
											<div class="form-group">
                                            <label>Remarks</label>
                                            <input type="text" name="note" class="form-control" placeholder="Remarks"  >
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
                                            <th>ID order</th>
                                            <th>Supplier</th>
											<th>Client</th>
											<th>Cuser</th>
											<th>ETA</th>
											<th>PPN</th>
											<th>Type Pay</th>
											<th>Payment</th>
											<th>Delivery</th>
											<th>Waranty</th>
											<th>Reference</th>
                                            <th>Remarks</th>
                                            <th>Cdate</th>
                                            

                                            
                                       
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listorder->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                        <td nowrap=""><a href="<?= base_url()?>index.php/order/delete/<?= $rows->id_order?>">
                                                                                    <button class="btn btn-danger" >
                                                                                        Delete
                                                                                    </button></a>
                                                                                    <a href="<?= base_url()?>index.php/order/formupdate/<?= $rows->id_order?>">
                                                                                    <button class="btn btn-warning" >
                                                                                        Update
                                                                                    </button></a>
                                                                                    <a href="<?= base_url()?>index.php/order/detail/<?= $rows->id_order?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Detail
                                                                                    </button></a>
																					<a href="<?= base_url()?>index.php/order/printorder/<?= $rows->id_order?>">
                                                                                    <button class="btn btn-success" >
                                                                                        Print
                                                                                    </button></a>
                                                                                    <a href="<?= base_url()?>index.php/order/send/<?= $rows->id_order?>">
                                                                                    <button class="btn btn-success" >
                                                                                        Send
                                                                                    </button></a>

                                                                                </td>
                                                          <td><?= $rows->id_order?></td>
                                                                                <td><?= $rows->nm_supplier?></td>
																				<td><?= $rows->nm_client?></td>
																				<td><?= $rows->nm_user?></td>
                                                          <td><?= $rows->eta?></td>
														  <td><?= $rows->ppn?></td>
														  <td><?= $rows->pay?></td>
														  <td><?= $rows->methodpay?></td>
														  <td><?= $rows->delivery?></td>
														  <td><?= $rows->waranty?></td>
														  <td><?= $rows->reference?></td>
														  <td><?= $rows->note?></td>
                                                          <td><?= $rows->cdate?></td>
                                                          
                                                                               
                                                                                
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
                "scrollY": 300,
				"scrollX": true
        });
    });
	
	$("#eta").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
    </script>
  </body>
</html>

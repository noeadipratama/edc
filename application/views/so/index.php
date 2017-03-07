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
            Sales Order
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
                                Add Sales Order
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-so" id="myModalLabel">Form Add so</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('so/insert'); ?>
                      
                    

                                            <div class="form-group">
                                            <label>client</label>
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
                                            <label>ETD</label>
                                            <input type="text" name="etd" id="etd" class="form-control" placeholder="yyyy-mm-dd"  >
                                            </div>
											
											<div class="form-group">
                                            <label>PPN</label>
                                            <input type="text" id="ppn" name="ppn" class="form-control" placeholder="PPN"  >
                                            </div>
											
											
											
											<div class="form-group">
                                            <label>No. PO</label>
                                            <input type="text" name="no_po" class="form-control" placeholder="No. PO"  >
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
                                            <label>Note</label>
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
                                <table class="table table-striped table-bsoed table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Options</th>
                                            <th>ID SO</th>
                                            <th>Client</th>
											<th>Cuser</th>
											<th>ETD</th>
											<th>PPN(%)</th>
											<th>Type Pay</th>
											<th>Payment</th>
											
											<th>No. PO</th>
											<th>Note</th>
                                            
                                            <th>Cdate</th>
                                            

                                            
                                       
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listso->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                        <td nowrap=""><a href="<?= base_url()?>index.php/so/delete/<?= $rows->id_so?>">
                                                                                    <button class="btn btn-danger" >
                                                                                        Delete
                                                                                    </button></a>
                                                                                    <a href="<?= base_url()?>index.php/so/formupdate/<?= $rows->id_so?>">
                                                                                    <button class="btn btn-warning" >
                                                                                        Update
                                                                                    </button></a>
                                                                                    <a href="<?= base_url()?>index.php/so/detail/<?= $rows->id_so?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Detail
                                                                                    </button></a>

                                                                                    <a href="<?= base_url()?>index.php/so/send/<?= $rows->id_so?>">
                                                                                    <button class="btn btn-success" >
                                                                                        Send
                                                                                    </button></a>

                                                                                </td>
                                                          <td><?= $rows->id_so?></td>
                                                                                <td><?= $rows->nm_client?></td>
																				<td><?= $rows->nm_user?></td>
                                                          <td nowrap><?= $rows->etd?></td>
														  <td nowrap><?= $rows->ppn?></td>
														  <td><?= $rows->pay?></td>
														  <td><?= $rows->methodpay?></td>
													
														  <td><?= $rows->no_po?></td>
														
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

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
                        <div class="panel-heading">
                            <!-- Button trigger modal -->
                            <button class="btn btn-primary " data-toggle="modal" data-target="#myModal">
                                Add Supplier
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-supplier" id="myModalLabel">Form Add Supplier</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('supplier/insert'); ?>
                      
                                            <div class="form-group">
                                            <label>Nama Supplier</label>
                                            <input type="text" name="nm_supplier" class="form-control" placeholder="Nama Supplier">
                                            </div>

                                            <div class="form-group">
                                            <label>Address Supplier</label>
                                            <input type="text" name="addr_supplier" class="form-control" placeholder="Address Supplier">
                                            </div>

                                            <div class="form-group">
                                            <label>Telp Supplier</label>
                                            <input type="text" name="tlp_supplier" class="form-control" placeholder="Telp Supplier">
                                            </div>

                                            <div class="form-group">
                                            <label>PIC Supplier</label>
                                            <input type="text" name="pic_supplier" class="form-control" placeholder="PIC Supplier">
                                            </div>
											
											<div class="form-group">
                                            <label>Email Supplier</label>
                                            <input type="text" name="email_supplier" class="form-control" placeholder="Email Supplier">
                                            </div>

                                            <div class="form-group">
                                            <label>Active</label>
                                            <select class="form-control" name="active">
                                            <option value="1" <?php echo set_select('myselect', '1', TRUE); ?> >Active</option>
                                            <option value="0" <?php echo set_select('myselect', '0'); ?> >Deactive</option>
                                            </select> 
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
                                            <th>ID Supplier</th>
                                            
                                            <th>Nama Supplier</th>
                                            <th>Address Supplier</th>
                                            <th>Telp Supplier</th>
                                            <th>PIC Supplier</th>
											<th>Email Supplier</th>
                                            <th>Active</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listsupplier->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                        <td nowrap=""><? if($session_level == 1 ){ ?><a href="supplier/delete/<?= $rows->id_supplier?>">
                                                                                    <button class="btn btn-danger" >
                                                                                        Delete
														</button></a><? } ?>
                                                                                    <a href="supplier/formupdate/<?= $rows->id_supplier?>">
                                                                                    <button class="btn btn-warning" >
                                                                                        Update
                                                                                    </button></a>                                                        
                                                                                </td>
                                                          <td><?= $rows->id_supplier?></td>
                                                                                
                                                          <td><?= $rows->nm_supplier?></td>
                                                          <td><?= $rows->addr_supplier?></td>
                                                                                <td><?= $rows->tlp_supplier?></td>
                                                        <td><?= $rows->pic_supplier?></td> 
															<td><?= $rows->email_supplier?></td> 
                                                          <td><?php if($rows->active == 1){echo "Active";}else{echo "Deactive";} ?></td>
                                                                                
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
    </script>
  </body>
</html>

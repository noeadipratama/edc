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
                        <div class="panel-heading">
                            <!-- Button trigger modal -->
                            <button class="btn btn-primary " data-toggle="modal" data-target="#myModal">
                                Add Inbound
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-inbound" id="myModalLabel">Form Add inbound</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('inbound/insert'); ?>
                      
                    

                                            <div class="form-group">
                                            <label>Ext No.</label>
                                            <input type="text" name="ext_no" class="form-control" placeholder="Note">
                                            </div>

                                            <div class="form-group">
                                            <label>ID Order</label>
                                            <input type="text" name="id_order" class="form-control" placeholder="ID Order">
                                            </div>

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
                                            <label>Warehouse</label>
                                            <select class="form-control" name="id_warehouse">
                                            <?php
                                                 foreach ($combobox_warehouse->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_warehouse?>"  ><?= $rowmenu->nm_warehouse?></option>
                                            <?php
                                            }
                                            ?>
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
                                <table class="table table-striped table-binbounded table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Options</th>
                                            <th>ID Inbound</th>
                                            <th>Supplier</th>
                                            <th>Ext No.</th>
                                            <th>ID Order</th>
                                            <th>Warehouse</th>
                                            <th>Cdate</th>
                                            <th>Cuser</th>

                                            
                                       
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listinbound->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                        <td nowrap=""><a href="inbound/delete/<?= $rows->id_inbound?>">
                                                                                    <button class="btn btn-danger" >
                                                                                        Delete
                                                                                    </button></a>
                                                                                    <a href="inbound/formupdate/<?= $rows->id_inbound?>">
                                                                                    <button class="btn btn-warning" >
                                                                                        Update
                                                                                    </button></a>
                                                                                    <a href="inbound/detail/<?= $rows->id_inbound?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Detail
                                                                                    </button></a>
                                                                                    <a href="inbound/send/<?= $rows->id_inbound?>">
                                                                                    <button class="btn btn-success" >
                                                                                        Send
                                                                                    </button></a>

                                                                                </td>
                                                          <td><?= $rows->id_inbound?></td>
                                                                                <td><?= $rows->nm_supplier?></td>
                                                          <td><?= $rows->ext_no?></td>
                                                          <td><?= $rows->id_order?></td>
                                                          <td><?= $rows->nm_warehouse?></td>
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
    </script>
  </body>
</html>

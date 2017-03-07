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
            Inbound Detail, ID Inbound: <?= $id_inbound?>
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
                                Add Inbound Detail
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-order" id="myModalLabel">Form Add Inbound Detail</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('inbound/Insertdetail'); ?>
                      
                                            <div class="form-group">
                                            <label>ID Inbound</label>
                                            <input type="text" name="id_inbound" class="form-control" readonly value="<?= $id_inbound?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Barang</label>
                                            <select class="form-control select2" style="width: 100%;" name="kd_barang">
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
                                            <input type="text" name="qty" class="form-control" placeholder="Qty">
                                            </div>

                                            <div class="form-group">
                                            <label>Price @</label>
                                            <input type="text" name="price" class="form-control" placeholder="Price">
                                            </div>

                                            <div class="form-group">
                                            <label>Location</label>
                                            <select class="form-control select2" style="width: 100%;" name="id_location">
                                            <?php
                                                 foreach ($combobox_location->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_location?>"  ><?= $rowmenu->nm_location?></option>
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Options</th>
                                            <th>ID Inbound Detail</th>
                                            <th>KD Barang</th>
											<th>Nama Barang</th>
                                            <th>Qty</th>
                                            <th>Uom</th>
                                            <th>Price @</th>
                                            <th>Location</th>
                                            <th>Cdate</th>
                                            <th>Cuser</th>

                                            
                                       
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listinbounddetail->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                        <td nowrap=""><a href="<?= base_url()?>index.php/inbound/deletedetail/<?= $rows->id_inbound_detail?>/<?= $rows->id_inbound?>">
                                                                                    <button class="btn btn-danger" >
                                                                                        Delete
                                                                                    </button></a>
                                                                                </td>
                                                            <td><?= $rows->id_inbound_detail?></td>
                                                            <td><?= $rows->kd_barang?></td>
															<td><?= $rows->nm_barang?></td>
                                                            <td><?= $rows->qty?></td>
                                                            <td><?= $rows->nm_uom?></td>
                                                            <td><?= $rows->price?></td>
                                                            <td><?= $rows->nm_location?></td>
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

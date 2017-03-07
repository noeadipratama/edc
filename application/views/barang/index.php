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
            Barang
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
                                Add Barang
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-barang" id="myModalLabel">Form Add Barang</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('barang/insert'); ?>
                      
                                            <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" name="nm_barang" class="form-control" placeholder="Nama barang">
                                             </div>

                                            
                                            <div class="form-group">
                                            <label>Uom</label>
                                            <select class="form-control" name="id_uom">
                                            <?php
                                                 foreach ($combobox_uom->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_uom?>"  ><?= $rowmenu->nm_uom?></option>
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>
											
											<div class="form-group">
                                            <label>Min Stock</label>
                                            <input type="text" name="min_stock" class="form-control" placeholder="Min Stock" value="">
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
                                            <th>ID barang</th>
                                            <th>KD barang</th>
                                            <th>Nama barang</th>
                                            <th>Uom</th>
											<th>Min Stock</th>
                                            <th>Active</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listbarang->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                        <td nowrap="">
														<? if($session_level == 1 ){ ?>
														<a href="barang/delete/<?= $rows->id_barang?>">
                                                                                    <button class="btn btn-danger" >
                                                                                        Delete
														</button></a>
                                                                                    <a href="barang/formupdate/<?= $rows->id_barang?>">
                                                                                    <button class="btn btn-warning" >
                                                                                        Update
                                                                                    </button></a>   <? } ?>                                                     
                                                                                </td>
                                                          <td><?= $rows->id_barang?></td>
                                                                                <td><?= $rows->kd_barang?></td>
                                                          <td><?= $rows->nm_barang?></td>
                                                                                <td><?= $rows->nm_uom?></td>
																				<td><?= $rows->min_stock?></td>
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

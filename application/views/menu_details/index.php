<!DOCTYPE html>
<html>
  <head>
    <?= $this->load->view('head'); ?>

  </head>

  <body class="sidebar-mini wysihtml5-supported skin-blue-light sidebar-collapse">
    <div class="wrapper">

      <?= $this->load->view('nav'); ?>
      <?= $this->load->view('menu_groups'); ?>
      

      <!-- Container -->
      <div class="content-wrapper">
        <!-- Judul Halaman -->
        <section class="content-header">
          <h1>
            Menu Details
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
                                Add Menu Details
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-menu_details" id="myModalLabel">Form Add Menu Details</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('menu_details/insert'); ?>
                      
                                            
                                            <div class="form-group">
                                            <label>KD Menu Detail</label>
                                            <input type="text" name="kd_menu_details" class="form-control" placeholder="KD Detail Menu">
                                            </div>

                                            <div class="form-group">
                                            <label>Menu Detail</label>
                                            <input type="text" name="nm_menu_details" class="form-control" placeholder="Detail Menu">
                                            </div>
                      
                                            <div class="form-group">
                                            <label>URL</label>
                                            <input type="text" name="url" class="form-control" placeholder="URL">
                                            </div>
                      
                                            <div class="form-group">
                                            <label>Position</label>
                                            <input type="text" name="position" class="form-control" placeholder="Position">
                                            </div>

                                            <div class="form-group">
                                            <label>Menu Groups</label>
                                            <select class="form-control" name="id_menu_groups">
                                            <?php     
                                                        foreach ($combo_menu_groups->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_menu_groups?>" <?php echo set_select('myselect', '$rowmenu->id_menu_groups'); ?> ><?= $rowmenu->nm_menu_groups?></option>
                                            
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>

                      <div class="form-group">
                      <label>Status</label>
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
                                            <th nowrap>Options</th>
                                            <th nowrap>ID Menu</th>
                                            <th nowrap>KD Menu</th>
                                            <th nowrap>Menu Detail</th>
                                            <th nowrap>URL</th>
                                            <th nowrap>Menu Groups</th>
                                            <th nowrap>Position</th>
                                            <th nowrap>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                            
                                                        foreach ($listmenu_details->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                                                <td nowrap><a href="menu_details/delete/<?= $rows->id_menu_details?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Delete
                                                                                    </button></a>
                                                                                    <a href="menu_details/formupdate/<?= $rows->id_menu_details?>">
                                                                                    <button class="btn btn-primary" >
                                                                                        Update
                                                                                    </button></a>                                                        
                                                                                </td>
                                                            <td><?= $rows->id_menu_details?></td>
                                                            <td><?= $rows->kd_menu_details?></td>
                                                            <td><?= $rows->nm_menu_details?></td>
                                                            <td><?= $rows->url?></td>
                                                            <td><?= $rows->nm_groups?></td>
                                                            <td><?= $rows->position?></td> 
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

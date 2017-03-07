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
            Menu Groups Akses
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
                                Add Menu Groups Access
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-menu_details_access" id="myModalLabel">Form Add Groups Access</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('menu_groups_access/insert'); ?>
                      
                      <div class="form-group">
                      <label>Level Access</label>
                                            <select class="form-control" name="id_level">
                      <?php
                                                        foreach ($combo_menu_level->result() as $rowmenu) {
                                                      ?>
                                            <option value="<?= $rowmenu->id_level?>" <?php echo set_select('myselect', '$rowmenu->id_level'); ?> ><?= $rowmenu->nm_level?></option>
                                            
                      <?php
                      }
                      ?>
                                            </select> 
                                            </div>
                      
                      <div class="form-group">
                      <label>Group Menu</label>
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
                                            <th nowrap>Option</th>
                                            <th nowrap>ID Access</th>
                                            <th nowrap>Level Access</th>
                      <th nowrap>Groups Menu</th>
                      <th nowrap>Status</th>
                      
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                            
                                                        foreach ($menu_groups_access->result() as $rows) {
                                                      ?>
                                                        <tr >
                                                                                <td nowrap><a href="menu_groups_access/delete/<?= $rows->id_menu_groups_access?>">
                                                                                    <button class="btn btn-danger" >
                                                                                        Delete
                                                                                    </button></a>
                                                                                    <a href="menu_groups_access/formupdate/<?= $rows->id_menu_groups_access?>">
                                                                                    <button class="btn btn-warning" >
                                                                                        Update
                                                                                    </button></a>                                                        
                                                                                </td>
                                                          <td><?= $rows->id_menu_groups_access?></td>
                                                          <td><?= $rows->nm_level?></td>
                                        <td><?= $rows->nm_menu_groups?></td>
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

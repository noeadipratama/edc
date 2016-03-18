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
            User
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
                                Add User
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-user" id="myModalLabel">Form Add User</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('user/insert'); ?>
                      
                                            

                                            <div class="form-group">
                                            <label>Nama User</label>
                                            <input type="text" name="nm_user" class="form-control" placeholder="Nama User">
                                            </div>

                                            <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" placeholder="Username">
                                            </div>

                                            <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Password" value="cmnc12345">
                                            </div>
                      
                                            <div class="form-group">
                                            <label>Atasan</label>
                                            <select class="form-control" name="id_atasan">

                                            <?php
                                                 foreach ($combobox_atasan->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_user?>"  ><?= $rowmenu->nm_user?></option>
                                            
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>

                                            <div class="form-group">
                                            <label>Level</label>
                                            <select class="form-control" name="id_level">

                                            <?php
                                                 foreach ($combobox_level->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_level?>"  ><?= $rowmenu->nm_level?></option>
                                            
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>



                                            <div class="form-group">
                                            <label>Cabang</label>
                                            <select class="form-control" name="id_cabang">

                                            <?php
                                                 foreach ($combobox_cabang->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_cabang?>"  ><?= $rowmenu->nm_cabang?></option>
                                            
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>

                                            <div class="form-group">
                                            <label>Perusahaan</label>
                                            <select class="form-control" name="id_perusahaan">

                                            <?php
                                                 foreach ($combobox_perusahaan->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_perusahaan?>"  ><?= $rowmenu->nm_perusahaan?></option>
                                            
                                            <?php
                                            }
                                            ?>
                                            </select> 
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
                                            <th nowraps>Options</th> 
                                            <th nowraps>ID User</th>
                                            <th nowraps>Nama User</th>
                                            <th nowraps>Username</th>
                                           
                                            <th nowraps>Level</th>
                                            <th nowraps>Cabang</th>
                                            <th nowraps>Perusahaan</th>
                                            <th nowraps>Atasan</th>
                                            <th nowraps>Active</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                              
                                                        foreach ($listuser->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                                                <td nowrap>
                                                                                <a href="user/delete/<?= $rows->id_user?>">
                                                                                <button class="btn btn-primary" >
                                                                                    Delete
                                                                                </button></a>
                                                                                <a href="user/formupdate/<?= $rows->id_user?>">
                                                                                <button class="btn btn-primary" >
                                                                                    Update
                                                                                </button></a>                                                   
                                                                                </td>
                                                          <td><?= $rows->id_user?></td>
                                                          <td><?= $rows->nm_user?></td>
                                                                                <td><?= $rows->username?></td>
                                                                               
                                                                                <td><?= $rows->nm_level?></td>
                                                                                <td><?= $rows->nm_cabang?></td>
                                                                                <td><?= $rows->nm_perusahaan?></td>
                                                                                <td><?= $rows->nm_atasan?></td>
                                                                                <td><?if($rows->active == 1 ) {echo "Active";}else{echo "Deactive";}?></td>
                                                                                
                                                
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

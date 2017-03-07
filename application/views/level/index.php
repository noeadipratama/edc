<!DOCTYPE html>
<html>
  <head>
    <?= $this->load->view('head'); ?>

  </head>

<<<<<<< HEAD
  <body class="sidebar-mini wysihtml5-supported skin-red-light">
=======
  <body class="sidebar-mini wysihtml5-supported skin-blue-light sidebar-collapse">
>>>>>>> bfcce828bb17041a2e0fcf450e0b00b79ae7835c
    <div class="wrapper">

      <?= $this->load->view('nav'); ?>
      <?= $this->load->view('menu_groups'); ?>
      

      <!-- Container -->
      <div class="content-wrapper">
        <!-- Judul Halaman -->
        <section class="content-header">
          <h1>
            Level
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
                                Add Level
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-level" id="myModalLabel">Form Add Level</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('level/insert'); ?>
                      
                      <div class="form-group">
                                            <label>Level</label>
                                            <input type="text" name="nm_level" class="form-control" placeholder="Name Level">
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
                                            <th>Options</th>
                                            <th>ID Level</th>
                                            <th>Level User</th>
                                            <th>Status</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                              
                                                        foreach ($listlevel->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                                                <td nowrap><a href="level/delete/<?= $rows->id_level?>">
<<<<<<< HEAD
                                                                                    <button class="btn btn-danger" >
                                                                                        Delete
                                                                                    </button></a>
                                                                                    <a href="level/formupdate/<?= $rows->id_level?>">
                                                                                    <button class="btn btn-warning" >
=======
                                                                                    <button class="btn btn-primary" >
                                                                                        Delete
                                                                                    </button></a>
                                                                                    <a href="level/formupdate/<?= $rows->id_level?>">
                                                                                    <button class="btn btn-primary" >
>>>>>>> bfcce828bb17041a2e0fcf450e0b00b79ae7835c
                                                                                        Update
                                                                                    </button></a>                                                        
                                                                                </td>
                                                          <td><?= $rows->id_level?></td>
                                                          <td><?= $rows->nm_level?></td>
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

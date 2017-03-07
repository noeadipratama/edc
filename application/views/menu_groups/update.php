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
            Menu Groups
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update Menu Groups
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listmenu_groupsselect->result() as $rows); {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('menu_groups/Update'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID Menu Groups</label>
                                            <input type="text" name="id_menu_groups" class="form-control" placeholder="ID Menu Groups" value="<?= $rows->id_menu_groups?>" readonly>
                                            </div>

                                            <div class="form-group">
                                            <label>Menu Groups</label>
                                            <input type="text" name="nm_menu_groups" class="form-control" placeholder="Name Menu Groups" value="<?= $rows->nm_menu_groups?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Icon</label>
                                            <input type="text" name="icon" class="form-control" placeholder="Icon" value="<?= $rows->icon?>">
                                            </div>   

                                            <div class="form-group">
                                            <label>Position</label>
                                            <input type="text" name="position" class="form-control" placeholder="Position" value="<?= $rows->position?>">
                                            </div>                                            

                                            <div class="form-group">
                                            <label>Status</label>
                                            <select class="form-control" name="active">
                                            <option value="1" <?php if ($rows->active == 1){echo set_select('myselect', '1',TRUE);} ?> >Active</option>
                                            <option value="0" <?php if ($rows->active == 0){echo set_select('myselect', '0',TRUE);} ?> >Deactive</option>                                            
                                            </select> 
                                            </div>
                      
                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/menu_groups"><input type="button" value="Cancel" class="btn btn-default"></a>
                                            </div> 
                                            <?php echo form_close(); ?>
                                            <? } ?>  
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

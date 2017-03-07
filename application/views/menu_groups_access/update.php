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
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update Level Access
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listmenu_groups_accessselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('menu_groups_access/Update'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID Access</label>
                                            <input type="text" name="id_menu_groups_access" class="form-control" placeholder="ID Access" value="<?= $rows->id_menu_groups_access?>" readonly>
                                            </div>

                      <div class="form-group">
                      <label>Level Access</label>
                                            <select class="form-control" name="id_level">
                      <?php
                                              
                                                        foreach ($combo_menu_level->result() as $rowmenu) {
                                                      ?>
                                            <option value="<?= $rowmenu->id_level?>" <?php if($rowmenu->id_level == $rows->id_level){echo "selected";} ?> ><?= $rowmenu->nm_level?></option>
                                            
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
                                            <option value="<?= $rowmenu->id_menu_groups?>" <?php if($rowmenu->id_menu_groups == $rows->id_menu_groups){echo "selected";} ?> ><?= $rowmenu->nm_menu_groups?></option>
                                            
                      <?php
                      }
                      ?>
                                            </select> 
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
                                            <a href="<?=base_url();?>index.php/menu_groups_access"><input type="button" value="Cancel" class="btn btn-default"></a>
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

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
            User
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Form Update User
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            <?php                                                        
                                            foreach ($listuserselect->result() as $rows) {
                                            ?>
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('user/Update'); ?>
                                            
                                            <div class="form-group">
                                            <label>ID User</label>
                                            <input type="text" name="id_user" class="form-control" placeholder="ID User" value="<?= $rows->id_user?>">
                                            </div>

                                           

                                            <div class="form-group">
                                            <label>Nama User</label>
                                            <input type="text" name="nm_user" class="form-control" placeholder="Nama User" value="<?= $rows->nm_user?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" name="username" class="form-control" placeholder="Username" value="<?= $rows->username?>">
                                            </div>    

                                            <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" class="form-control alert-danger" placeholder="Password" value="">
                                            </div>

                                           

                                            <div class="form-group">
                                            <label>Atasan</label>
                                            <select class="form-control" name="id_atasan">

                                            <?php
                                                 foreach ($combobox_atasan->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->id_user?>" <?php if ($rows->id_atasan == $rowmenu->id_user){echo "selected"; }else{} ?> ><?= $rowmenu->nm_user?></option>
                                            
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
                                            <option value="<?= $rowmenu->id_level?>" <?php if ($rows->id_level == $rowmenu->id_level){echo "selected"; }else{} ?> ><?= $rowmenu->nm_level?></option>
                                            
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
                                            <option value="<?= $rowmenu->id_cabang?>" <?php if ($rows->id_cabang == $rowmenu->id_cabang){echo "selected"; }else{} ?> ><?= $rowmenu->nm_cabang?></option>
                                            
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
                                            <option value="<?= $rowmenu->id_perusahaan?>" <?php if ($rows->id_perusahaan == $rowmenu->id_perusahaan){echo "selected"; }else{} ?> ><?= $rowmenu->nm_perusahaan?></option>
                                            
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>                                            

                                            <div class="form-group">
                                            <label>Active</label>
                                            <select class="form-control" name="active">
                                            <option value="1" <?php if ($rows->active == 1){echo set_select('myselect', '1',TRUE);} ?> >Active</option>
                                            <option value="0" <?php if ($rows->active == 0){echo set_select('myselect', '0',TRUE);} ?> >Deactive</option>                                            
                                            </select> 
                                            </div>

                                            <div class="form-group">
                                            <input type="submit" value="Save" class="btn btn-primary">
                                            <a href="<?=base_url();?>index.php/user"><input type="button" value="Cancel" class="btn btn-default"></a>
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

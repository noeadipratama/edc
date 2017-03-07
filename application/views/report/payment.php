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
            Report Order
          </h1>
        </section>

        <!-- Main content -->
        <section class="invoice">
        
            
        <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- panel-heading -->
                        <div class="panel-heading">
                            Export Excel Order
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                                            
                                            <?php echo validation_errors(); ?>

                                            <?php echo form_open('report/excelorder'); ?>
                                           
                                            <div class="form-group">
                                            <label>Tanggal Awal</label>
                                            <input type="text" name="tgl_awal" id="tgl_awal" class="form-control" placeholder="yyyy-mm-dd">
                                            </div>

                                            <div class="form-group">
                                            <label>Tanggal Akhir</label>
                                            <input type="text" name="tgl_akhir" id="tgl_akhir"  class="form-control" placeholder="yyyy-mm-dd">
                                            </div>                                            

                                            <div class="form-group">
                                            <input type="submit" value="Cari" class="btn btn-primary">
                                            </div>

                                            <?php echo form_close(); ?>
                                            
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
    $(function() {
            $( "#tgl_awal" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd"
            });
        });
    $(function() {
            $( "#tgl_akhir" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd"


            });
        });
    </script>
  </body>
</html>

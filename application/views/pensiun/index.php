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
            Pensiun
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
                                Add Pensiun
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-pensiun" id="myModalLabel">Form Add Pensiun</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('pensiun/insert'); ?>
                      
                                            <div class="form-group">
                                            <label>No Pensiun</label>
                                            <input type="text" name="no_pensiun" class="form-control" placeholder="No Pensiun">
                                            </div>

                                            <div class="form-group">
                                            <label>No Rekening</label>
                                            <input type="text" name="no_rekening" class="form-control" placeholder="No Rekening">
                                            </div>

                                            <div class="form-group">
                                            <label>No KTP</label>
                                            <input type="text" name="no_ktp" class="form-control" placeholder="No KTP">
                                            </div>                                            

                                            <div class="form-group">
                                            <label>Nama Pensiun</label>
                                            <input type="text" name="nm_pensiun" class="form-control" placeholder="Name Pensiun">
                                            </div>

                                            <div class="form-group">
                                            <label>Tgl Lahir</label>
                                            <input type="text" name="tgl_lahir_pensiun" class="form-control" placeholder="YYYY-MM-DD">
                                            </div>

                                            <div class="form-group">
                                            <label>Alamat Pensiun</label>
                                            <input type="text" name="alamat_pensiun" class="form-control" placeholder="Alamat Pensiun">
                                            </div>

                                            <div class="form-group">
                                            <label>No Telp</label>
                                            <input type="text" name="no_tlp" class="form-control" placeholder="No Tlp">
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
                                            <th>No. Pensiun</th>
                                            <th>No. Rekening</th>
                                            <th>No. KTP</th>
                                            <th>Nama Pensiun</th>
                                            <th>Tanggal Lahir</th>
                                            <th>Alamat</th>
                                            <th>No. Tlp</th>
                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                              
                                                        foreach ($listpensiun->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                            <td nowrap>
                                                            <a href="pensiun/delete/<?= $rows->no_pensiun?>">
                                                            <button class="btn btn-primary" >Delete</button></a>
                                                            <a href="pensiun/formupdate/<?= $rows->no_pensiun?>">
                                                            <button class="btn btn-primary" >Update</button></a>                    
                                                            </td>
                                                            <td><?= $rows->no_pensiun?></td>
                                                            <td><?= $rows->no_rekening?></td>
                                                            <td><?= $rows->no_ktp?></td>
                                                            <td><?= $rows->nm_pensiun?></td>
                                                            <td><?= $rows->tgl_lahir_pensiun?></td>
                                                            <td><?= $rows->alamat_pensiun?></td>
                                                            <td><?= $rows->no_tlp?></td>                  
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

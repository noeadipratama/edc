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
            Penyaluran
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
                                Add Penyaluran
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-penyaluran" id="myModalLabel">Form Add Penyaluran</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('penyaluran/insert'); ?>
                      
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
                                            <label>Nama Penyaluran</label>
                                            <input type="text" name="nm_penyaluran" class="form-control" placeholder="Name Penyaluran">
                                            </div>

                                            <div class="form-group">
                                            <label>Tgl Lahir</label>
                                            <input type="text" name="tgl_lahir_penyaluran" class="form-control" placeholder="YYYY-MM-DD">
                                            </div>

                                            <div class="form-group">
                                            <label>Alamat Penyaluran</label>
                                            <input type="text" name="alamat_penyaluran" class="form-control" placeholder="Alamat Penyaluran">
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
                                            <th>No. Penyaluran</th>
                                            <th>Bank</th>
                                            <th>User</th>
                                            <th>Perusahaan</th>
                                            <th>No. Pensiun</th>
                                            <th>Umur</th>
                                            <th>SK</th>
                                            <th>Salary</th>
                                            <th>PYD</th>
                                            <th>Jangka Waktu</th>
                                            <th>Adm</th>
                                            <th>Materai</th>
                                            <th>Tabungan Awal</th>
                                            <th>Angsuran Awal</th>
                                            <th>Provisi</th>
                                            <th>Angsuran Bulanan</th>
                                            <th>Tabungan Bulanan</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                     
                                    <?php
                                              
                                                        foreach ($listpenyaluran->result() as $rows) {
                                                      ?>
                                                        <tr>
                                                            <td nowrap>
                                                            <a href="penyaluran/delete/<?= $rows->no_penyaluran?>">
                                                            <button class="btn btn-primary" >Delete</button></a>
                                                            <a href="penyaluran/formupdate/<?= $rows->no_penyaluran?>">
                                                            <button class="btn btn-primary" >Update</button></a>                    
                                                            </td>
                                                            <td><?= $rows->no_penyaluran?></td>
                                                            <td><?= $rows->no_rekening?></td>
                                                            <td><?= $rows->no_ktp?></td>
                                                            <td><?= $rows->nm_penyaluran?></td>
                                                            <td><?= $rows->tgl_lahir_penyaluran?></td>
                                                            <td><?= $rows->alamat_penyaluran?></td>
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

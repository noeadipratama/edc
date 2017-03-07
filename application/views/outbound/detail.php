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
            Outbound Detail, ID Outbound: <?= $id_outbound?>
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
                                Add Outbound Detail
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="Form-add-order" id="myModalLabel">Form Add Outbound Detail</h4>
                                        </div>
                                        <div class="modal-body">
                      <?php echo validation_errors(); ?>

                      <?php echo form_open('outbound/insertdetail'); ?>
                      
                                            <div class="form-group">
                                            <label>ID Outbound</label>
                                            <input type="text" name="id_outbound" class="form-control" readonly value="<?= $id_outbound?>">
                                            </div>

                                            <div class="form-group">
                                            <label>Barang</label>
                                            <select class="form-control select2" style="width: 100%;" name="kd_barang">
                                            <?php
                                                 foreach ($combobox_barang->result() as $rowmenu) {
                                                        ?>
                                            <option value="<?= $rowmenu->kd_barang?>"  ><?= $rowmenu->kd_barang?> - <?= $rowmenu->nm_barang?></option>
                                            <?php
                                            }
                                            ?>
                                            </select> 
                                            </div>    

                                            <div class="form-group">
                                            <label>Qty</label>
                                            <input type="text" name="qty" class="form-control" placeholder="Qty">
                                            </div>

                                            <div class="form-group">
                                            <label>Price Sales</label>
                                            <input type="text" name="price" class="form-control" placeholder="Price">
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
                                <table class="table table-striped table-bordered table-hover" id="dataTables-examples">
                                    <thead>
                                        <tr>
                                            <th >Options</th>
                                            <th >ID Outbound Detail</th>
                                            <th>KD Barang</th>
                                            <th>Qty</th>
                                            <th>Uom</th>
                                            <th>Price @</th>
                                            <th>Cdate</th>

                                            
                                       
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php     
                                                        foreach ($listoutbounddetail->result() as $rows) {
                                                      ?>
                                                        <tr class="bg-white  color-palette" >
                                                        <td ><a href="<?= base_url()?>index.php/outbound/deletedetail/<?= $rows->id_outbound_detail?>/<?= $rows->id_outbound?>">
                                                                                    <button class="btn btn-danger" >
                                                                                        <i class="fa fa-trash"></i>
                                                                                    </button></a>
                                                                                </td>
                                                            <td><?= $rows->id_outbound_detail?></td>
                                                            <td><?= $rows->kd_barang?> <br><?= $rows->nm_barang?></td>
                                                            <td><?= $rows->qty?></td>
                                                            <td><?= $rows->nm_uom?></td>
                                                            <td><?= $rows->price?> <br>Total : <?= $rows->price * $rows->qty?></td>
                                                            <td><?= $rows->nm_user?> <br> <?= $rows->cdate?></td>
                                                                                
                                                        </tr>
                                                        <? $qtytot = $this->model_outbound->getstock($rows->kd_barang);
                                                                $tot = $qtytot['qty'];
                                                                $style = "success";
                                                                if(empty($tot)){$tot = 0; $style = "danger";}
                                                             ?>
                                                        <tr class="bg-purple disabled color-palette" >
                                                            <td ><a class="btn btn-<?= $style?> btn-sm">Qty SOH : <?= $tot ?>  <?= $rows->nm_uom?></a></td>
                                                            <td ></td>
                                                            <td >ID Allocation</td>
                                                            <td >Qty</td>
                                                            <td >Uom</td>
                                                            <td >Location</td>
                                                            <td ></td>
                                                            
                                                        </tr>
                                                        <?php    
                                                        $qty = 0 ; 
                                                            foreach ($this->model_outbound->getAlloutboundallocation($rows->id_outbound_detail)->result() as $rowsa) {
                                                        ?>

                                                        <tr class="bg-white  color-palette" >
                                                            <td ></td>
                                                            <td ><a href="<?= base_url()?>index.php/outbound/deleteallocation/<?= $rowsa->id_outbound_allocation?>/<?= $rows->id_outbound?>"><button class="btn btn-danger " ><i class="fa fa-close"></i></button></a></td>
                                                            <td ><?= $rowsa->id_outbound_allocation?></td>
                                                            <td ><?= $rowsa->qty?></td>
                                                            <td ><?= $rowsa->nm_uom?></td>
                                                            <td ><?= $rowsa->nm_location?></td>
                                                            <td ></td>
                                                        <? $qty = $qty + $rowsa->qty; ?>
                                                        </tr>
                                                        <? } ?>
                                                        <tr class="bg-aqua disabled color-palette" >
                                                            <td ></td>
                                                            <td ></td>
                                                            <td >Total Allocation</td>
                                                            <td ><?= $qty?></td>
                                                            <td ><?= $rows->nm_uom?></td>
                                                            <td ></td>
                                                            <td ></td>
                                                            
                                                        </tr>
                                                        <tr class="bg-orange disabled  color-palette" >
                                                            
                                                            <td ></td>
                                                            <td ><? if( $rows->qty - $qty > 0 and $tot != 0){?><a href="<?= base_url()?>index.php/outbound/allocation/<?= $rows->id_outbound_detail?>/<?= $rows->id_outbound?>" class="btn btn-success "><i class="fa fa-play"></i> Allocate</a> <? } ?></td>
                                                            <td >Total Sisa Permintaan</td>
                                                            <td ><?= $rows->qty - $qty?></td>
                                                            <td ><?= $rows->nm_uom?></td>
                                                            <td ></td>
                                                            <td ></td>
                                                            
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

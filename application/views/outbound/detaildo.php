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
                           <a href="<?= base_url()?>index.php/outbound/printdo/<?= $id_outbound?>">
                                                                                    <button class="btn btn-success" >
                                                                                        Print
                                                                                    </button></a>
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
                                                        <td >
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
                                                            <td ></td>
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

<!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
         
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">IMS Indoproc v1.0.0</li>
            <li><a href="<?=base_url();?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <?php 
                            foreach ($this->model_menu->getAllMenugroups($session_level)->result() as $rows)  
                            {
                        ?>
            <li class="treeview">
              <a href="#">
                <i class="<?= $rows->icon?>"></i> <span><?= $rows->nm_menu_groups?></span> <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <?php
                          
                            foreach ($this->model_menu->getAllMenudetails($rows->id_menu_groups, $session_level)->result() as $rows)  
                            {
                            ?>
                <li><a href="<?=base_url();?>index.php/<?= $rows->url?>"><i class="fa fa-circle-o"></i> <?= $rows->nm_menu_details?></a></li>
                <?php } ?>
              </ul>
            </li>
            <?php } ?>
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
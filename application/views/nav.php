    <header class="main-header">
        <!-- Logo -->
        <a href="<?= base_url()?>" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
<<<<<<< HEAD
          <span class="logo-mini"><b>IMS</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>IMS</b> Indoproc</span>
=======
          <span class="logo-mini"><b>EDC</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>EDC</b> KSU Sarina</span>
>>>>>>> bfcce828bb17041a2e0fcf450e0b00b79ae7835c
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <? 
                        $session = $this->session->userdata('login');
                        $cabang = $this->model_menu->selectcabang($session['id_cabang']);
                        $perusahaan = $this->model_menu->selectperusahaan($session['id_perusahaan']); ?>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-wrench"></span> Rubah Password</a>
                        <div class="dropdown-menu" style="padding: 15px; padding-bottom: 10px;">
                        <form class="form-horizontal"  method="post" action="<?= base_url()?>index.php/home/update" accept-charset="UTF-8">
                        <input class="form-control login" type="password" name="password_lama" placeholder="Password Lama" />
                        <div class="divider"></div>
                        <input class="form-control login" type="password" name="password_baru" placeholder="Password Baru"/>
                        <div class="divider"></div>
                        <input class="btn btn-warning" type="submit" name="submit" value="Save" />
                        </form>
                        </div>
                        </li>
              
<<<<<<< HEAD
              <!-- <li>
                <a href="#" data-toggle="control-sidebar"> <i class="fa fa-bank"></i> <?= $cabang['nm_cabang']?></a>
              </li> 

               <li>
                <a href="#" data-toggle="control-sidebar"> <i class="fa fa-bank"></i> <?= $perusahaan['nm_perusahaan']?></a>
              </li> -->
=======
              <li>
                <a href="#" data-toggle="control-sidebar"> <i class="fa fa-bank"></i> <?= $cabang['nm_cabang']?></a>
              </li>

               <li>
                <a href="#" data-toggle="control-sidebar"> <i class="fa fa-bank"></i> <?= $perusahaan['nm_perusahaan']?></a>
              </li>
>>>>>>> bfcce828bb17041a2e0fcf450e0b00b79ae7835c
              
              <li>
                <a href="#" data-toggle="control-sidebar"> <i class="fa fa-user"></i> <?= $nm_user?></a>
              </li>
              
              <li>
                <a href="<?=base_url()?>index.php/welcome/logout" > <i class="fa fa-power-off"></i> Logout</a>
              </li>

            </ul>
          </div>
        </nav>
    </header>
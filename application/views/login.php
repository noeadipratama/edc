<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->load->view('head'); ?>

</head>

<body >

    <div class="login-box">
        <div class="row">
            <div class="login-box-body">

                <div class="login-panel panel panel-default">

                    <div class="panel-heading">
                        <h3 class="panel-title" align="center">Welcome</h3>
                    </div>

                    <div class="panel-body">
                        <?php echo validation_errors(); ?>

                        <?php echo form_open('login_validation'); ?>
                            <fieldset>

                                <div class="form-group " align="center">
                                <img width="200" height="" src="<?= base_url()?>assets/img/logo.png"  alt=""/><br>
                                    <? echo $alert; ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" type="username" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
                             </fieldset>   
                             
                        <?php echo form_close(); ?>
                        <div class="web-description">
                        <h5 align="center">Copyright &copy; 2016 Inventory Management System</h5>
                        <h5 align="center">Indoproc</h5>
                        </div>
                    </div>
					
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                </div>
            

    <?= $this->load->view('basic_js'); ?>
    <!-- Additional JS -->
    
    

</body>

</html>

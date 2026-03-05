<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link href="<?PHP echo base_url() ?>/assets/login/styles/bootstrap.css" rel="stylesheet">
    <link href="<?PHP echo base_url() ?>/assets/login/styles/bootstrap-responsive.min.css" rel="stylesheet">
    <link href=" <?PHP echo base_url() ?>/assets/login/styles/styles.css" rel="stylesheet">
    <script src=" <?PHP echo base_url() ?>/assets/login/styles/jquery.min.js"></script>
    <script src=" <?PHP echo base_url() ?>/assets/login/js//script.js"></script>
    <script src=" <?PHP echo base_url() ?>/assets/login/js//bootstrap.min.js"></script>
    <script src=" <?PHP echo base_url() ?>/assets/login/js//jquery.validate.min.js"></script>
    
   <?php
                $status_login = $this->session->userdata('status_login');
                if (empty($status_login)) {
                    $message = "Silahkan login untuk masuk ke aplikasi";
                } else {
                    $message = $status_login;
                }
                ?>
    <title>LOGIN</title>
</head>
<body>
<div class="container">

    <div id="loginbox" style="margin-top:50px;" class="card card-container">
        <div align="center" style="margin-bottom: 30px">
            <img src="<?PHP echo base_url() ?>/assets/login/images/sipetik.png" />
        </div>
        
        
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title"><?php echo $message; ?></div>
            </div>

            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
              <?php echo form_open('auth/cheklogin'); ?>
                    <div style="margin-bottom: 25px" class="input-group">
                        
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username/no HP">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                    </div>


                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <center>

                        <div class="col-sm-12 controls">
                            <input type="submit" class="btn btn-success btn-large" value="Login"/>
                          
							<a href="https://dp2kbp3a.bandungkab.go.id/ppa/index.php/home#about" class="btn btn-success  btn-large" >Daftar</a>
                        </div>
                            </center>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
    <script src="<?php echo base_url(); ?>/assets/login/script.js"></script>
</body>
</html>
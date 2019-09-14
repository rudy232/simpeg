<?php 
  if($this->session->flashdata('sukses')){
    echo '<div class="alert alert-danger alert-block" style="width:500px;height:50px;text-align:center;margin:0 auto;">';
    echo $this->session->flashdata('sukses');
    echo '</div>';

  }
  $query = $this->db->query('SELECT logo FROM profile_rs');
  $row = $query->row(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title><?php echo $title ?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/matrix-admin-package/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/matrix-admin-package/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/matrix-admin-package/css/fullcalendar.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/matrix-admin-package/css/matrix-style.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/matrix-admin-package/css/matrix-media.css" />
<link href="<?php echo base_url()?>assets/matrix-admin-package/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/matrix-admin-package/css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?php echo base_url()?>assets/matrix-admin-package/css/uniform.css" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/matrix-admin-package/css/select2.css" />
<link href="<?php echo base_url()?>assets/matrix-admin-package/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url()?>assets/matrix-admin-package/css/matrix-login.css" />
</head>
<body>
<?php echo form_open(base_url('login')); ?>
        <div id="loginbox">            
            <form id="loginform" class="form-vertical" action="index.html">
                 <div class="control-group normal_text"> <h3><img src="<?php echo base_url().'/assets/matrix-admin-package/img/thumbnail_logo/'.$row->logo ?>" width="200" height="200" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" name="username" placeholder="Username" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="password" placeholder="Password" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>
                    <span class="pull-right"><input type="submit" class="btn btn-success" value="LOGIN"/></span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
                <p class="normal_text">Masukan alamat email anda untuk dapat mereset password</p>
                
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form>
        </div>
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/excanvas.min.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/jquery.flot.min.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/jquery.flot.resize.min.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/jquery.peity.min.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/fullcalendar.min.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/matrix.dashboard.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/jquery.gritter.min.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/matrix.interface.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/matrix.chat.js"></script>  
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/jquery.wizard.js"></script>   
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/matrix.popover.js"></script>

        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/jquery.min.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/jquery.ui.custom.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/bootstrap.min.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/jquery.uniform.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/select2.min.js"></script>
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/jquery.validate.js"></script>  
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/matrix.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/matrix.form_validation.js"></script>

        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/jquery.dataTables.min.js"></script> 
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/matrix.tables.js"></script>       
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/jquery.min.js"></script>  
        <script src="<?php echo base_url()?>assets/matrix-admin-package/js/matrix.login.js"></script> 
    </body>
<?php echo form_close(); ?>
</html>
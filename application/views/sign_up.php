<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DAFTAR | KITTY</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/form-elements.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/login/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/cat.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>assets/login/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>assets/login/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>assets/login/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>assets/login/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <!-- <h1><strong>Bootstrap</strong> Login Form</h1>
                            <div class="description">
                            	<p>
	                            	This is a free responsive login form made with Bootstrap. 
	                            	Download it on <a href="http://azmind.com"><strong>AZMIND</strong></a>, customize and use it as you like!
                            	</p>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h1>Daftar</h1>
                                        </div>
                        		<div class="form-top-right">
                        			<i class="fa fa-paw"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
                                        <?php
                                            if (!empty($notifError)) {
                                                echo '<div class="alert alert-danger">'.$notifError.'!</div>';
                                            } else if (!empty($notifSuccess)) {
                                                echo '<div class="alert alert-success">'.$notifSuccess.'! <a href="'.base_url().'/login"><u>Login here!</u></a></div>';
                                            }
                                        ?>
			                    <!-- <form role="form" action="<?php echo base_url(); ?>signup/verify" method="post" class="login-form"> -->
                                <form role="form" action="<?php echo base_url(); ?>signup/register" method="post" class="login-form">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <input type="hidden" name="form-hash" class="form-firstname form-control" id="form-hash" value="<?php 
                                                $hash = md5( rand(0,1000) );
                                                echo $hash;
                                                 ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
        			                    	<div class="form-group">
        			                    		<label class="sr-only" for="form-firstname">Nama Depan</label>
        			                        	<input type="text" name="form-firstname" placeholder="Nama Depan" class="form-firstname form-control" id="form-firstname">
        			                        </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label class="sr-only" for="form-lastname">Nama Belakang</label>
                                                <input type="text" name="form-lastname" placeholder="Nama Belakang" class="form-lastname form-control" id="form-lastname">
                                            </div>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-username">Nama Pengguna</label>
                                            <input type="text" name="form-username" placeholder="Nama Pengguna" class="form-username form-control" id="form-username">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-email">Email</label>
                                            <input type="text" name="form-email" placeholder="Email" class="form-email form-control" id="form-email">
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only" for="form-phone">No Telp</label>
                                            <input type="text" name="form-phone" placeholder="No Telp" class="form-phone form-control" id="form-phone">
                                        </div>
    			                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label class="sr-only" for="form-password">Kata Sandi</label>
                                                <input type="password" name="form-password" placeholder="Kata Sandi" class="form-password form-control" id="form-password">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group">
                                                <label class="sr-only" for="form-confpassword">Konfirmasi Kata Sandi</label>
                                                <input onkeyup="confirm()" type="password" name="form-confpassword" placeholder="Konfirmasi Kata Sandi" class="form-confpassword form-control" id="form-confpassword">
                                                <span id="rest"></span>
                                            </div>
                                        </div>
                                    </div>
                                        <input type="submit" name="submit" class="btn btn-block" value="Daftar">
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<!-- <h3>...or login with:</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div> -->
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="<?php echo base_url(); ?>assets/login/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/login/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/login/js/jquery.backstretch.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/login/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>
<script>
    function confirm() {
        $conf = $('#form-confpassword').val();
        $ret = $('#form-password').val();
        if($conf != $ret){
            $('#rest').html("* Password doesn't match");
            $('#form-confpassword').css('background','#655E7A');
            $('#form-confpassword').css('border','none');
            $('#form-confpassword').css('color','white');
        }else{
            $('#rest').html('');
            $('#form-confpassword').css('background','white');
            $('#form-confpassword').css('color','#888');
        }
    }
</script>

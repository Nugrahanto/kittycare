<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin | Kitty</title>
        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/cat.png">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">
        <!-- Bootstrap Core Css -->
        <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- Styles -->
        <link href="<?php echo base_url(); ?>assets/admin/css/lib/calendar2/semantic.ui.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/lib/chartist/chartist.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/lib/themify-icons.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/admin/css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/admin/css/lib/owl.theme.default.min.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/admin/css/lib/weather-icons.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>assets/admin/css/lib/menubar/sidebar.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/lib/helper.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/admin/css/stylecustom.css" rel="stylesheet">
    </head>

    <body>

        <div class="sidebar sidebar-hide-to-small sidebar-shrink sidebar-gestures" style="position: fixed">
            <div class="nano">
                <div class="nano-content">
                    <ul>
                        <div class="logo"><a href="<?php echo base_url(); ?>admin"><!-- <img src="assets/images/logo.png" alt="" /> --><span>KITTY</span></a></div>
                        <li class="label">Utama</li>
                        <li><a href="<?php echo base_url(); ?>admin"><i class="ti-home"></i> Beranda </a></li>
                        <li class="label">Menu</li>
                        <li><a href="<?php echo base_url(); ?>admin/user"><i class="ti-user"></i> Pengguna </a></li>
                        <!-- <li><a href="/kitty/admin/group"><i class="ti-bar-chart-alt"></i> Groups </a></li> -->
                        <li><a class="sidebar-sub-toggle"><i class="ti-layout"></i>  Artikel  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>admin/article/add">Tambah</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/article">Daftar</a></li>
                            </ul>
                        </li>
                        <li><a class="sidebar-sub-toggle"><i class="ti-bar-chart-alt"></i>  Grup  <span class="sidebar-collapse-icon ti-angle-down"></span></a>
                            <ul>
                                <li><a href="<?php echo base_url(); ?>admin/group/add">Tambah</a></li>
                                <li><a href="<?php echo base_url(); ?>admin/group">Daftar</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url(); ?>admin/cat"><i class="ti-github"></i> Kategori Kucing </a></li>
                        <li><a href="<?php echo base_url(); ?>admin/indication"><i class="ti-shield"></i> Penyakit / Gejala </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /# sidebar -->

        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="float-left">
                            <div class="hamburger sidebar-toggle">
                                <span class="line"></span>
                                <span class="line"></span>
                                <span class="line"></span>
                            </div>
                        </div>
                        <div class="float-right">
                            <ul>                                
                                <li class="header-icon dib"><span class="user-avatar"><?php echo $this->session->userdata('username'); ?> <i class="ti-angle-down f-s-10"></i></span>
                                    <div class="drop-down dropdown-profile">
                                        <div class="dropdown-content-heading">
                                            <span class="text-left">Have a nice day...</span>
                                            <!--<p class="trial-day">99 Days Trail</p>-->
                                        </div>
                                        <div class="dropdown-content-body">
                                            <ul>
                                                <li><a href="<?php echo base_url(); ?>logout"><i class="ti-power-off"></i> <span>Logout</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <?php 
                        $this->load->view($main_view);
                    ?>
                </div>
            </div>
        </div>
        <div id="search">
            <button type="button" class="close">×</button>
            <form>
                <input type="search" value="" placeholder="type keyword(s) here" />
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>

            
        <!-- jquery vendor -->
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/jquery.nanoscroller.min.js"></script>
        <!-- nano scroller -->
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/menubar/sidebar.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/preloader/pace.min.js"></script>
        <!-- sidebar -->

        <!-- Jquery Core Js -->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>

        <!-- Bootstrap Core Js -->
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.js"></script>


        <!-- bootstrap -->

        <script src="<?php echo base_url(); ?>assets/admin/js/lib/calendar-2/moment.latest.min.js"></script>
        <!-- scripit init-->
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/calendar-2/semantic.ui.min.js"></script>
        <!-- scripit init-->
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/calendar-2/prism.min.js"></script>
        <!-- scripit init-->
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/calendar-2/pignose.calendar.min.js"></script>
        <!-- scripit init-->
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/calendar-2/pignose.init.js"></script>
        <!-- scripit init-->


        <script src="<?php echo base_url(); ?>assets/admin/js/lib/weather/jquery.simpleWeather.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/weather/weather-init.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/circle-progress/circle-progress.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/circle-progress/circle-progress-init.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/chartist/chartist.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/chartist/chartist-init.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/sparklinechart/jquery.sparkline.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/sparklinechart/sparkline.init.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/owl-carousel/owl.carousel.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/owl-carousel/owl.carousel-init.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/scripts.js"></script>
        <!-- scripit init-->
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/data-table/datatables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/data-table/buttons.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/data-table/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/data-table/buttons.flash.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/data-table/jszip.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/data-table/pdfmake.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/data-table/vfs_fonts.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/data-table/buttons.html5.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/data-table/buttons.print.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/admin/js/lib/data-table/datatables-init.js"></script>
    </body>

</html>

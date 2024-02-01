<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hasil Konsultasi - Admin | Kitty</title>

    <!-- ================= Favicon ================== -->
    <!-- Standard -->
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- Styles -->
    <link href="<?php echo base_url(); ?>assets/admin/css/lib/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/css/lib/themify-icons.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/css/lib/helper.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/admin/css/stylecustom.css" rel="stylesheet">
</head>

<body class="bg-def">

    <div class="unix-invoice">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div id="invoice" class="effect2 m-t-120">
                        <div id="invoice-top">
                            <div class="invoice-logo"></div>
                            <div class="invoice-info">
                                <h2>Kitty Care</h2>
                                <p><a href="mailto:admin@gmail.com?Subject=Legal%Issues">Dr. Kitty White</a></p>
                                <p>KittyCare Serenity <br>
                                Jl. Sucipto, Kemanan, Kemiri, Probolinggo. <br></p>
                            </div>
                            <!--End Info-->
                            <div class="title">
                                <h4>Consultation #<?= $det_konsul->id_history ?></h4>
                                <p><?= $det_konsul->first_name;?> <?= $det_konsul->last_name;?></p>
                                <p>Tanggal Konsultasi: <?php 
                                 date_default_timezone_set("Asia/Bangkok");
                                 $tgl = date("M d, Y", strtotime($det_konsul->tgl_konsultasi));
                                 echo $tgl; 
                                 ?></p>
                            </div>
                            <!--End Title-->
                        </div>
                        <!--End InvoiceTop-->

                        <div id="invoice-mid" class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 row">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <p><b><?= $det_konsul->nama_kucing ?></b><br>
                                    <?= $det_konsul->nama_jenis ?><br>
                                        <?php 
                                            $lahir = $det_konsul->tgl_lahir;
                                            $biday = new DateTime($lahir);
                                            $today = new DateTime();
                                            $diff = $today->diff($biday);
                                            echo ''.$diff->y.' tahun '.$diff->m.' bulan '.$diff->d.' hari ';
                                        ?>  
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!--End Invoice Mid-->
                        <h5>Gejala :</h5>
                        <?php
                            $no = 1;
                            foreach ($gejala_history as $data) {                        
                                echo '
                                    <p>'.$no.'. '.$data->nama_gejala.'</p>
                                ';
                                $no++;
                            }
                        ?>

                        <div id="invoice-bot">

                            <div id="invoice-table">
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr class="tabletitle">
                                            <td class="table-item" style="width: 200px;">
                                                <h2>Penyakit :</h2>
                                            </td>
                                            <td class="Hours">
                                                <h2></h2>
                                            </td>
                                            <td class="Hours">
                                                <h2></h2>
                                            </td>
                                        </tr>

                                            <?php
                                            if (is_array($gejala_penyakit_history) && !empty($gejala_penyakit_history)) { 
                                                $no = 1;
                                                foreach ($gejala_penyakit_history as $data) {                        
                                                    echo '
                                                    <tr class="service">
                                                        <td class="tableitem">
                                                            <p class="itemtext">'.$no.'. '.$data->nama_penyakit.'</p>
                                                        </td>
                                                        <td class="tableitem">
                                                            <p class="itemtext">'.$data->keterangan.'</p>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                    ';
                                                    $no++;
                                                }
                                            } else {
                                                echo "
                                                    <tr class='service'>
                                                        <td class='tableitem'>
                                                            <p class='itemtext'><i>No Disease's found.</i></p>
                                                        </td>
                                                        <td class='tableitem>
                                                            <p class=itemtext'></p>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                ";
                                            }
                                            ?>
                                    </table>
                                </div>
                            </div>
                            <!--End Table-->
                            <br>
                            <button id="printPageButton" class="btn btn-md btn-bg" onClick="window.print();">CETAK</button>
                        </div>
                        <!--End InvoiceBot-->
                    </div>
                    <!--End Invoice-->
                </div>
            </div>
        </div>
    </div>

</body>

</html>
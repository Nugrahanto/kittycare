                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hi, <span>Ini adalah tabel penyakit / gejala</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Beranda</a></li>
                                    <li class="breadcrumb-item active">Penyakit | Gejala</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- /# row -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="bootstrap-data-table-panel">
                                    <div class="table-responsive">
                                    <!-- <button class="btn btn-md btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Add Category</button> -->
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px;">No</th>
                                                    <th>Nama</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $no = 1;
                                                foreach ($disease as $data) {
                                                echo '
                                                    <tr>
                                                        <td>'.$no.'</td>
                                                        <td>'.$data->nama_penyakit.'</td>
                                                        <td style="width:100px;"><a href="'. base_url().'admin/indication/detail/'.$data->id_penyakit.'"><button class="btn btn-md btn-success"><i class="fa fa-list"></i> DETAIL</button></a></td>
                                                    </tr>
                                                ';
                                                $no++;
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /# card -->
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="footer">
                                <p>2018 © Halaman Admin. - <a href="http://www.kittycare.tk">kittycare.tk</a></p>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
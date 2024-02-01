                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hi, <span>Ini adalah tabel pengguna</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Beranda</a></li>
                                    <li class="breadcrumb-item active">Pengguna</li>
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
                                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Nama Pengguna</th>
                                                    <th>Email</th>
                                                    <th>No. Telp</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $no = 1;
                                                foreach ($user as $data) {
                                                echo '
                                                    <tr ondblclick="myFunction('.$data->id_user.')">
                                                        <td>'.$no.'</td>
                                                        <td>'.$data->first_name.' '.$data->last_name.'</td>
                                                        <td>'.$data->username.'</td>
                                                        <td>'.$data->email.'</td>
                                                        <td>'.$data->phone.'</td>
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
            <script type="text/javascript">
                function myFunction(id) {
                    window.location = "<?php echo base_url(); ?>admin/user/detail/"+id;
                }
            </script>
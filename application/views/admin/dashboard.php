					<div class="row">
                        <div class="col-lg-8 p-r-0 title-margin-right">
                            <div class="page-header">
                                <div class="page-title">
                                    <h1>Halo, <span>Selamat Datang!</span></h1>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                        <div class="col-lg-4 p-l-0 title-margin-left">
                            <div class="page-header">
                                <div class="page-title">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">Beranda</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- /# column -->
                    </div>
                    <!-- /# row -->
                    <section id="main-content">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-user color-success border-success"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Pengguna</div>
                                            <div class="stat-digit"><?php echo $this->db->where('id_user != ', 0)->count_all_results('users'); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-github color-primary border-primary"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Hewan</div>
                                            <div class="stat-digit"><?php echo $this->db->count_all_results('kucing'); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-layout-grid2 color-pink border-pink"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Grup</div>
                                            <div class="stat-digit"><?php echo $this->db->count_all_results('groups'); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="card">
                                    <div class="stat-widget-one">
                                        <div class="stat-icon dib"><i class="ti-help color-danger border-danger"></i></div>
                                        <div class="stat-content dib">
                                            <div class="stat-text">Konsultasi</div>
                                            <div class="stat-digit"><?php echo $this->db->count_all_results('history'); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card bg-primary">
                                            <div class="weather-widget">
                                                <div id="weather-one" class="weather-one p-22"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="footer">
                                    <p>2018 © Halaman Admin. - <a href="http://www.kittycare.tk">kittycare.tk</a></p>
                                </div>
                            </div>
                        </div>
                    </section>


                <section id="main-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-lg-12">
                                            <!-- <h6 class="card-title">Typography</h6> -->
											<div class="card-content">
												<!-- <h6 class="card-subtitle">Use tags <code>h1 to h6</code> for get desire heading.</h6> -->
												<h1><?= $det_article->title_article ?></h1>
                                                <p>
                                                <?php
                                                    $tgl = date("d M Y", strtotime($det_article->date_post));
                                                echo 'Tanggal Posting : '.$tgl.'' ?>
                                                </p>
											</div>
                                            <br>
                                            <div>
                                                <a href="<?php echo base_url(); ?>admin/article/delete/<?php echo ''.$det_article->id_article.''; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> HAPUS</button></a>
                                                <a href="<?php echo base_url(); ?>admin/article/edit/<?php echo ''.$det_article->id_article.''; ?>"><button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> EDIT</button></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                        <div class="col-lg-12 offset-lg-1">
    										<div class="card-content">
                                                <div class="card-img">
                                                    <img src="<?php echo base_url(); ?>uploads/article/<?php echo $det_article->picture_article; ?>" alt="">
                                                </div>
                                                <br>
                                                <p class="text-justify"><?php echo $det_article->desc_article ?></p>
                                            </div>
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
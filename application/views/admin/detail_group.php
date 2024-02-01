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
															<h1><?= $det_group->name ?></h1>
														</div>
                                                        <br>
                                                        <div>
                                                            <a href="<?php echo base_url(); ?>admin/group/delete/<?php echo ''.$det_group->id_group.''; ?>"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> HAPUS</button></a>
                                                            <a href="<?php echo base_url(); ?>admin/group/edit/<?php echo ''.$det_group->id_group.''; ?>"><button class="btn btn-sm btn-info"><i class="fa fa-pencil"></i> EDIT</button></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="col-12">
                                                        <hr>
                                                        <br>
                                                    </div>
                                                    <div class="col-lg-12 offset-lg-1">
														<div class="card-content">
                                                        <p class="text-justify"><?php echo $det_group->description ?></p>
                                                    </div>
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
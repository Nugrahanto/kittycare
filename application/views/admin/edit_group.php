

                <section id="main-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <form method="post" action="<?php echo base_url(); ?>admin/group/do_edit">
                                        <div class="row justify-content-between">
                                            <div class="col-lg-12">
                                                <!-- <h6 class="card-title">Typography</h6> -->
    											<div class="card-content">
    												<!-- <h6 class="card-subtitle">Use tags <code>h1 to h6</code> for get desire heading.</h6> -->
                                                    <input class="form-control" type="text" name="id_group" value="<?= $det_group->id_group ?>" required hidden>
                                                    <h1><input class="form-control input-default" type="text" name="title_group" value="<?= $det_group->name ?>" required></h1>
    											</div>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="col-12">
                                                <hr>
                                            </div>
                                            <div class="col-lg-12 offset-lg-1">
        										<div class="card-content">
                                                    <textarea name="description" rows="20" class="ta form-control input-default" placeholder="Taruh artikel disini" required><?= $det_group->description ?></textarea>
                                                </div>
                                                <br>
                                                <input class="btn btn-success btn-block btn-lg" type="submit" name="submit" value="EDIT">
                                            </div>
                                        </div>
                                    </form>
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
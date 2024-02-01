                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Tambah Daftar Grup</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="post" action="<?php echo base_url(); ?>admin/group/do_add">
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12"></code>.</p>
                                                <input name="title" type="text" class="form-control input-default " placeholder="Judul" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Deskripsi Grup</label>
                                                <textarea name="description" rows="10" class="ta form-control input-default" placeholder="Taruh deskripsi grup disini" required></textarea>
                                            </div>
                                            <input class="btn btn-success btn-block btn-lg" type="submit" name="submit" value="TAMBAH">
                                        </form>
                                    </div>
                                </div>
                            </div>
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
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Tambah Artikel</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form action="<?php echo base_url(); ?>admin/article/do_add" method="post" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12"></p>
                                                <input name="title_article" type="text" class="form-control input-default " placeholder="Judul" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Isi Artikel</label>
                                                <textarea name="desc_article" rows="10" class="ta form-control input-default" placeholder="Taruh artikel disini" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file" name="file_name" required>
                                                <p>*maks 10 MB</p>
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
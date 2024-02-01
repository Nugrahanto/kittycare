                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hi, <span>Ini adalah tabel kategori kucing</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin">Beranda</a></li>
                                    <li class="breadcrumb-item active">Kategori Kucing</li>
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
                                    <button class="btn btn-md btn-success" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah Kategori</button>
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
                                                foreach ($cat as $data) {
                                                echo '
                                                    <tr>
                                                        <td>'.$no.'</td>
                                                        <td style="width:600px;">'.$data->nama_jenis.'</td>
                                                        <td style="width:150px;"><a href="'. base_url().'admin/cat/remove/'.$data->id_jenis.'"><button class="btn btn-md btn-danger"><i class="fa fa-trash"></i> Hapus</button></a></td>
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

                  <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-lg">
        
          <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Cat Category</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" id="form-pendaftaran" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/cat/add"> 
              <div class="box-body">
                <div class="form-group">
                  <label for="nama_jenis" class="col-sm-2 control-label">Name Category</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_jenis" placeholder="Name Category"
                    name="nama_jenis" required>
                  </div>
                </div>              
                
                <input type="submit" name="submit" class="btn btn-info" value="Tambah"> 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
              </div>
              <!-- /.box-footer -->
            </form>
        </div>
      </div>  
          
        </div>
      </div>
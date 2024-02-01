
                <section id="main-content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row justify-content-between">
                                        <div class="col-lg-12">
                                            <!-- <h6 class="card-title">Typography</h6> -->
                                            <div class="card-content">
                                                <!-- <h6 class="card-subtitle">Use tags <code>h1 to h6</code> for get desire heading.</h6> -->
                                                <h1><?= $det_disease->nama_penyakit ?></h1>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="col-12">
                                            <hr>
                                            <br>
                                        </div>
                                        <div class="col-lg-12 offset-lg-1">
                                            <div class="card-content">
                                            <p class="text-justify"><?php echo $det_disease->keterangan ?></p>
                                            <br>
                                            <h4>GEJALA :</h4>
                                            <table id="" class="table">
                                                <tbody>
                                                <?php 
                                                    $no = 1;
                                                    foreach ($indication_disease as $data) {
                                                    echo '
                                                        <tr>
                                                            <td style="width: 10px;">'.$no.'</td>
                                                            <td hidden style="width: 10px;" id="ig">'.$data->id_gejala.'</td>
                                                            <td style="width:600px;" id="ng">'.$data->nama_gejala.'</td>
                                                            <td style="width:150px;">
                                                                <button class="btn btn-md btn-success" data-toggle="modal" data-target="#myModal" onclick="edit_gejala(this)"><i class="fa fa-pencil"></i> Edit</button>
                                                                <a href="'. base_url().'admin/indication/delete/'.$data->id_gejala.'"><button class="btn btn-md btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
                                                            </td>
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
                            </div>
                        </div>
                    </div>
                </section>

                <section id="main-content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4>Tambah Gejala</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="post" action="<?php echo base_url(); ?>admin/indication/do_add">
                                            <div class="form-group">
                                                <p class="text-muted m-b-15 f-s-12">The Indication will be created by <code>admin</code>.</p>
                                                <input name="id_penyakit" type="text" class="form-control input-default hidden" value="<?= $det_disease->id_penyakit ?>" required>
                                                <input name="nama_gejala" type="text" class="form-control input-default " placeholder="Nama Gejala" required>
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

                 <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-md">
        
          <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
            <div class="col-md-3">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="col-md-9">
                <h4 class="modal-title">Edit Gejala</h4>
            </div>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" id="form-pendaftaran" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/indication/edit"> 
              <div class="box-body">
                <div class="form-group">
                  <div class="col-md-12">
                    <input type="text" class="form-control" id="id_gejala" name="id_gejala" hidden required>
                  </div>
                  <div class="col-md-12">
                    <input type="text" class="form-control" id="nama_gejala" name="nama_gejala" required>
                  </div>
                    <input type="submit" name="submit" class="btn btn-md btn-success" value="Edit">
                </div>
                    
              </div>
              <!-- /.box-body -->
            </form>
        </div>
      </div>  
          
        </div>
      </div>

      <script>
        function edit_gejala(e) {
          var _ig = $(e).parents('tr').find('#ig').text().trim();
          var _ng = $(e).parents('tr').find('#ng').text().trim();
          $('#id_gejala').attr('value', _ig);
          $('#nama_gejala').attr('value', _ng);
          console.log(oldAction + _ig);
        }
      </script>
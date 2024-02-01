<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Kucing Peliharan.</h1>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam.</p>-->
        </div>
      </div>
    </div>
  </div>
</section>




<!-- Portfolio Start -->
<section class="portfolio-work">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <div class="portfolio-menu">
            <!-- <ul>
              <li class="filter" data-filter="all">All</li>
              <li class="filter" data-filter=".Branding">Branding</li>
              <li class="filter" data-filter=".Websites">Websites</li>
              <li class="filter" data-filter=".Graphic">Graphic</li>
              <li class="filter" data-filter=".design">Design</li>
              <li class="filter" data-filter=".Video">Video</li>
            </ul> -->
          </div>
          <div class="portfolio-contant">
            <ul class="text-center">
              <li class="mix">
                <a href="#" data-toggle="modal" data-target="#myModal" data-filter="all">
                  <img src="<?php echo base_url(); ?>assets/images/portfolio/add.jpg" alt="">
                  <div class="item-overly">
                    <div class="position-center">
                      <h4>Tambah Kucing Peliharaan</h4>
                    </div>
                  </div>
                </a>
              </li>

              <?php 
                foreach($cat as $data){
                  date_default_timezone_set("Asia/Bangkok");
                  $tgl = date("d-m-Y", strtotime($data->tgl_lahir));
                  $upper = strtoupper($data->nama_kucing);
                  $lahir = $data->tgl_lahir;
                  $biday = new DateTime($lahir);
                  $today = new DateTime();
                  $diff = $today->diff($biday);
                  echo '
                    <li class="mix">
                      <a>
                        <img src="'.base_url().'assets/images/portfolio/cat.jpg" alt="">
                        <div class="item-overly">
                          <div class="position-center">
                            <br>
                            <h2><u>'.$upper.'</u></h2>
                            <p>Kucing '.$data->nama_jenis.'</p>
                            <p>( '.$diff->y.' tahun '.$diff->m.' bulan '.$diff->d.' hari )</p>
                            <p>'.$data->jenis_kelamin.'</p>
                          </div>
                        </div>
                      </a>
                    </li>
                  ';
                }
              ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

      <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-md">
        
          <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">TAMBAH KUCING PELIHARAAN</h4>
        </div>
        <div class="modal-body">
          <form class="form-horizontal" method="post" id="form-pendaftaran" enctype="multipart/form-data" action="pets/add"> 
              <div class="box-body">

                <div class="form-group">
                  <label for="id_jenis" class="col-sm-3 control-label">Jenis Kucing</label>

                  <div class="col-sm-9">
                    <select name="id_jenis" class="form-control" required>
                      <option value="">[Pilih Jenis Kucing]</option>';
                            <?php 
                                $pelajaran = $this->db->query("SELECT * FROM jenis_kucing")
                                                      ->result();

                                if (!empty($pelajaran)) {
                                  foreach ($pelajaran as $data) {
                                    echo "<option value='".$data->id_jenis."' >".$data->nama_jenis."</option>";
                                    }
                                }
                            ?>      
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="nama_kucing" class="col-sm-3 control-label">Nama Kucing</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_kucing" placeholder="Nama Kucing"
                    name="nama_kucing" value="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="tgl_lahir" class="col-sm-3 control-label">Tanggal Lahir</label>

                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="tgl_lahir" placeholder="dd-mm-YYYY"
                    name="tgl_lahir" value="" required>
                  </div>
                </div>

                <div class="form-group">
                  <label for="jenis_kelamin" class="col-sm-3 control-label">Jenis Kelamin</label>

                  <div class="col-sm-9">
                    <select name="jenis_kelamin" class="form-control" required>
                      <option value="">[Pilih Jenis Kelamin]</option>
                      <option value="Laki-Laki">Laki - Laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                </div>
                
                <input type="submit" name="submit" class="btn btn-template" value="Tambah"> 
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
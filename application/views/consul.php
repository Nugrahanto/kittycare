<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Cek Konsultasi.</h1>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam.</p>-->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- contact form start -->
<section class="contact-form">
    <div class="container">
        <div class="row">
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="consultation/check"> 
                <div class="col-md-6 col-sm-12">
                <?php
                    if (!empty($notif)) {
                        echo '<div class="alert alert-danger">'.$notif.'</div>';
                    }
                ?>                    
                    <div class="block">
                        
                        <div class="form-group">
                            <label>Email :</label>
                            <input name="email" type="text" class="form-control" placeholder="<?php echo $this->session->userdata('email');?>" disabled>
                        </div>
                        <div class="form-group">
                            <label>Pilih Kucing :</label>
                            <select name="id_kucing" class="form-control" required>
                              <option value="">[Pilih Jenis Kucing]</option>';
                                    <?php 
                                        $user = $this->session->userdata('id_user');
                                        $cat = $this->db->query("SELECT * FROM kucing WHERE id_user = ".$user."")
                                                        ->result();

                                        if (!empty($cat)) {
                                          foreach ($cat as $data) {
                                            echo "<option value='".$data->id_kucing."' >".$data->nama_kucing."</option>";
                                            }
                                        } else {
                                            echo "<option value='' disabled>Tidak Ditemukan Kucing Peliharaan.</option>";
                                        }
                                    ?>      
                            </select>
                        </div>
                        <h6>* mohon pilih gejala yang sesuai dengan gejala kucing anda, setelah itu klik tombol cek konsultasi</h6>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="block">
                        <div class="form-group-2">
                            <!-- <textarea name="user_message" class="form-control" rows="3" placeholder="Your Message"></textarea> -->
                            <label>Gejala :</label>
                            <div class="jcarousel-wrapper">
                                <div class="jcarousel">
                                    <ul>
                                    <?php
                                      $no = 1;
                                      $gejala = $this->db->query("SELECT * FROM gejala")
                                                         ->result();
                                              if (!empty($gejala)) {
                                                $length = (count($gejala) - (count($gejala) % 5)) / 5 + 1;
                                                $curNo = 1;
                                                for ($i=0; $i < $length; $i++) {
                                                    echo '
                                                  <li>
                                                      <div class="carouselcstm">
                                                          <table id="bootstrap-data-table-export" class="table table-bordered table-consul">
                                                              <thead>
                                                                  <tr>
                                                                      <th style="width:10px">No</th>
                                                                      <th>Nama Gejala</th>
                                                                      <th style="width:5px"></th>
                                                                  </tr>
                                                              </thead>
                                                              <tbody> ';
                                                                  $no = $curNo;
                                                                  $numAdd = $i == $length -1 ? (count($gejala) % 5) - 1 : 4;
                                                                  for ($j=$curNo - 1; $j < $curNo + $numAdd; $j++) {
                                                                      echo '
                                                                          <tr>
                                                                              <td>'.$no.'</td>
                                                                              <td>'.$gejala[$j]->nama_gejala.'</td>
                                                                              <td><input type="checkbox" name="gejala[]" value="'.$gejala[$j]->id_gejala.'"></td>
                                                                          </tr>
                                                                          ';
                                                                      $no++;
                                                                  }
                                                                      echo '
                                                              </tbody>
                                                          </table>
                                                      </div>
                                                  </li>
                                                  ';
                                                  $curNo += 5;
                                              }
                                          }
                                      ?>
                                    </ul>
                                </div>

                                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                                <a href="#" class="jcarousel-control-next">&rsaquo;</a>

                                <!-- <p class="jcarousel-pagination">

                                </p> -->
                            </div>
                            <br>
                            <button class="btn btn-template" type="submit" name="submit">Cek Konsultasi</button>
                            <!-- <input type="submit" name="submit" class="btn btn-template btn-block" value="Check Consultation">  -->
                    </div>
                </div>
                <div class="error" id="error">Sorry Msg dose not sent</div>
                <div class="success" id="success">Message Sent</div>
            </form>
        </div>
    </div>
</section>
          <div class="row">
            <div class="col-lg-8 p-r-0 title-margin-right">
              <div class="page-header">
                <div class="page-title">
                  
                </div>
              </div>
            </div>
            <!-- /# column -->
            <div class="col-lg-4 p-l-0 title-margin-left">
              <div class="page-header">
                <div class="page-title">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/user">Pengguna</a></li>
                    <li class="breadcrumb-item active">Detail Pengguna</li>
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
                  <div class="card-body">
                    <div class="user-profile">
                      <div class="row">
                        <div class="col-lg-4">
                          <div class="user-photo m-b-30">
                            <!--<img class="img-fluid" src="<?php echo base_url(); ?>assets/admin/images/user.png" alt="" />-->
                            <img class="img-fluid" src="<?php echo base_url(); ?>uploads/foto_profil/<?php echo $det_user->foto; ?>" alt="" />
                          </div>
                          <!-- <div class="user-work">
                            <h4>work</h4>
                            <div class="work-content">
                              <h3>It Solution </h3>
                              <p>123, South Mugda</p>
                              <p>New York, 1214</p>
                            </div>
                            <div class="work-content">
                              <h3>Unix</h3>
                              <p>123, South Mugda</p>
                              <p>New York, 1214</p>
                            </div>
                          </div>
                          <div class="user-skill">
                            <h4>Skill</h4>
                            <ul>
                              <li><a href="#">Branding</a></li>
                              <li><a href="#">UI/UX</a></li>
                              <li><a href="#">Web Design</a></li>
                              <li><a href="#">Wordpress</a></li>
                              <li><a href="#">Magento</a></li>
                            </ul>
                          </div> -->
                        </div>
                        <div class="col-lg-8">
                          <div class="user-profile-name"><?php echo "$det_user->first_name $det_user->last_name"; ?></div>
                          <div class="user-Location">Data Dibuat : <?php echo $det_user->create_on ?></div>
                          <!-- <div class="user-job-title">Data Create : <?php echo $det_user->create_on ?></div> -->
                          <!-- <div class="ratings">
                            <h4>Ratings</h4>
                            <div class="rating-star">
                              <span>8.9</span>
                              <i class="ti-star color-primary"></i>
                              <i class="ti-star color-primary"></i>
                              <i class="ti-star color-primary"></i>
                              <i class="ti-star color-primary"></i>
                              <i class="ti-star"></i>
                            </div>
                          </div> -->
                          <!-- <div class="user-send-message"><button class="btn btn-primary btn-addon" type="button"><i class="ti-email"></i>Send Message</button></div> -->
                          <div class="custom-tab user-profile-tab">
                            <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation" class="active"><a href="#1" aria-controls="1" role="tab" data-toggle="tab">Tentang</a></li>
                                <a href="<?php echo base_url(); ?>admin/user/delete/<?php echo ''.$det_user->id_user.'';?>"><button class="btn btn-md btn-danger"><i class="fa fa-trash"></i> Hapus</button></a>
                            </ul>
                            <div class="tab-content">
                              <div role="tabpanel" class="tab-pane active" id="1">
                                <div class="contact-information">
                                  <h4>Informasi Dasar</h4>
                                  <div class="email-content">
                                    <span class="contact-title">Email</span>
                                    <span class="contact-email"><?php echo $det_user->email ?></span>
                                  </div>
                                  <div class="email-content">
                                    <span class="contact-title">Nama Pengguna</span>
                                    <span class="contact-email"><?php echo $det_user->username ?></span>
                                  </div>
                                  <div class="phone-content">
                                    <span class="contact-title">No. Telp</span>
                                    <span class="phone-number"><?php echo $det_user->phone; ?></span>
                                  </div>
                                  <div class="phone-content">
                                    <span class="contact-title">Active</span>
                                    <span class="phone-number"><?php echo $det_user->active; ?></span>
                                  </div>
                                </div>
                               <!--  <div class="basic-information">
                                  <h4>Basic information</h4>
                                  <div class="birthday-content">
                                    <span class="contact-title">Birthday:</span>
                                    <span class="birth-date">January 31, 1990 </span>
                                  </div>
                                  <div class="gender-content">
                                    <span class="contact-title">Gender:</span>
                                    <span class="gender">Male</span>
                                  </div>
                                </div> -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /# row -->
            <div class="row">
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-title">
                    <h4>Hewan Peliharaan </h4>

                  </div>
                  <div class="card-body bootstrap-data-table-panel">
                    <div class="table-responsive">
                      <table class="table table-hover ">
                        <thead>
                          <tr>
                            <th>Nama</th>
                            <th>Jenis Kucing</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            if (is_array($det_user_pets) && !empty($det_user_pets)) {
                              foreach ($det_user_pets as $data) {
                                $tgl = date("d-m-Y", strtotime($data->tgl_lahir));
                              echo '
                              <tr>
                                <td>'.$data->nama_kucing.'</td>
                                <td>'.$data->nama_jenis.'</td>
                                <td>'.$tgl.'</td>
                                <td>'.$data->jenis_kelamin.'</td>
                              </tr>
                              ';
                              }
                            } else {
                              echo '
                              <tr>
                                <td colspan="4">No Pets Found</td>
                              </tr>
                              ';
                            }

                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card">
                  <div class="card-title">
                    <h4>Jejak Konsultasi </h4>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-hover ">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Hewan Peliharaan</th>
                            <th>Tanggal</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php 
                            $no = 1;
                            $id_user = $this->session->userdata('id_user');
                            if (is_array($det_user_history) && !empty($det_user_history)) {
                              foreach ($det_user_history as $data) {
                                $tgl = date("d-m-Y", strtotime($data->tgl_konsultasi));
                              echo '
                              <tr>
                                <td>'.$no.'</td>
                                <td>'.$data->nama_kucing.'</td>
                                <td>'.$tgl.'</td>
                                <td>
                                    <a href="'.base_url().'admin/user/detail_history/'.$data->id_history.'"><button class="btn btn-success">Detail</button></a>
                                </td>
                              </tr>
                              ';
                              $no++;
                              }
                            } else {
                              echo '
                              <tr>
                                <td colspan="4">No History Found</td>
                              </tr>
                              ';
                            }

                            ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /# column -->
            </div>
            <div class="row">
              <div class="col-lg-12">
                <div class="footer">
                  <p>2018 © Admin Board. - <a href="http://www.kittycare.tk">kittycare.tk</a></p>
                </div>
              </div>
            </div>
          </section>
        </div>
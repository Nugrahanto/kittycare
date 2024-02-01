<section class="portfolio-single-page section-sm">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div>
            <img class="img-responsive" src="<?php echo base_url(); ?>uploads/foto_profil/<?php echo $user->foto; ?>">
          </div>
      </div>
      <div class="col-md-6">
        <div class="project-details mt-50">
          <h4>Detail Anggota </h4>
          <ul>
          <?php
              $id_user = $this->session->userdata('id_user');
              if ($user->id_user === $id_user) {
                echo '
            <form method="post" action="'.base_url().'profile/edit_profile">
              <li><span><i class="fa fa-envelope "></i> Email</span><span><input class="form-control form-input" type="text" name="email" value="'.$user->email.'" disabled></span></li>
              <li><span><i class="fa fa-shirtsinbulk "></i> Nama Pengguna</span><span><input class="form-control form-input" type="text" name="username" value="'.$user->username.'" disabled></span></li>
              <li><span><i class="fa fa-shield "></i> Nama Depan</span><span><input class="form-control form-input" type="text" name="first_name" value="'.$user->first_name.'"></span></li>
              <li><span><i class="fa fa-shield "></i> Nama Belakang</span><span><input class="form-control form-input" type="text" name="last_name" value="'.$user->last_name.'"></span></li>
              <li><span><i class="fa fa-phone"></i> Telepon</span><span><input class="form-control form-input" type="text" name="phone" value="'.$user->phone.'"></span></li>
              <li><span><i class="fa fa-camera"></i> Foto</span> <span><input type="file" name="foto" value=""></span><br><p style="font-size: 8pt;">*maksimal ukuran 5 MB</p></li>
              <br>
              <input class="btn btn-bg" type="submit" name="submit" value="EDIT PROFILE">
              <input class="btn btn-bg" type="submit" name="submit_foto" value="EDIT FOTO">
            </form>
            <br>
            <form class="form-horizontal" method="post" enctype="multipart/form-data" action="'.base_url().'profile/ganti_foto">
              <li><span><i class="fa fa-camera"></i> Foto</span> <span><input type="file" name="foto" value=""></span><br><p style="font-size: 8pt;">*maksimal ukuran 5 MB</p></li>
              <input class="btn btn-bg" type="submit" name="submit" value="EDIT FOTO">
            </form>
                ';
              } else{
                echo '
                <li><span><i class="fa fa-shield "></i> Nama</span><strong> '.$user->first_name.' '.$user->last_name.'</strong></li>
                <li><span><i class="fa fa-shirtsinbulk "></i> Nama Pengguna</span><strong> '.$user->username.'</strong></li>
                <li><span><i class="fa fa-ils "></i> Email</span><strong> '.$user->email.'</strong></li>
                <li><span><i class="fa fa-phone"></i> Telepon</span> '.$user->phone.'</li>
                ';
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
</section>

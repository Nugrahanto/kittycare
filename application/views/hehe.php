<?php 
						    foreach ($comment_group as $data) {
						    date_default_timezone_set("Asia/Bangkok");
                  			$tgl = date("d M Y, H:i", strtotime($data->comment_created));

                  				if ($data->comment_parent == 0) {
					          			echo '
					          				<li class="media">

										        <a class="pull-left" href="#">
										            <img class="media-object comment-avatar" src="'.base_url().'assets/images/blog/avater-4.jpg" alt="" width="50" height="50">
										        </a>

										        <div class="media-body">

										            <div class="comment-info">
										                <h4 class="comment-author">
										                    <a href="<?php echo base_url(); ?>profile/user?'.md5('id_user').'='.$data->id_user.'">'.$data->first_name.' '.$data->last_name.'</a>
										                </h4>
										                <time>'.$tgl.'</time>
										                <a class="comment-button reply" onclick="prepareComment('.$data->id_comment.')" href="#comment_reply"><i class="tf-ion-chatbubbles"></i>Reply</a>
										            </div>

										            <p>
										                '.$data->comment_body.'
										            </p>

										        </div>

										    </li>
							                  ';
					          		} 
							    }
						    ?>



						    <h5>Gejala ke-'.$no.'.</h5>
                            <p>
                                <input type="checkbox" name="gejala[]" value="'.$data->id_gejala.'"> '.$data->nama_gejala.'
                            </p>
                            <p style="font-size:9pt;">*Centang apabila peliharaan anda mengalami gejala tersebut.</p>


                            <td>
											<?php
											$var = $hitungan[$penyakit->id_penyakit];
											$persen = $var*10000;
											// $persentasi=round($var/$total * 100,2);
											echo ''.$persen.' %';
											?>
										</td>



										
								<td>
									<?php
									$var = $hitungan[$penyakit->id_penyakit];
									$round = round($var, 4);
									$persen = $round * 100;
									// $persentasi=round($var/$total * 100,2);
									echo ''.$persen.' %';
									?>
								</td>


								
                                                                  $no = $curNo;
                                                                  $numAdd = $i == 3 ? 1 : 4;
                                                                  // echo count($gejala);
                                                                  // echo $length;
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




<section class="page-wrapper bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h2>Kitty Care</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi, repudiandae.</p>
				<p>Drh. Kitty White</p>
				<address>
					Kitty Care, Inc. <br>
					Malang, G6B/2 <br>
					ID
					<br><br>
					<?php 
						date_default_timezone_set("Asia/Bangkok");
						$tgl = date("d M Y");
						echo $tgl;
					?>
				</address>
				<button id="printPageButton" class="btn btn-md btn-bg" onClick="window.print();">CETAK KONSULTASI</button>
			</div>
			<div class="col-md-8">
				<h1>
				<?php 
					$upper = strtoupper($det_history->nama_kucing);
					echo $upper;
				?>
				</h1>
				<div class="col-md-4 col-sm-4 col-xs-5">
					<p>Pemilik</p>
					<p>Jenis Kucing</p>
					<p>Jenis Kelamin Kucing</p>
					<p>Umur Kucing</p>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-7">
					<p>: <?php echo $det_history->first_name;?> <?php echo $det_history->last_name;?></p>
					<p>: <?php echo $det_history->nama_jenis;?></p>
					<p>: <?php echo $det_history->jenis_kelamin;?></p>
					<p>: <?php 
							$lahir = $det_history->tgl_lahir;
					        $biday = new DateTime($lahir);
					        $today = new DateTime();
					        $diff = $today->diff($biday);
							echo ''.$diff->y.' tahun '.$diff->m.' bulan '.$diff->d.' hari ';
						?>	
					</p>
				</div>
				<h3 style="margin-top: 180px">Gejala :</h3>
				<?php
					$no = 1;
					foreach ($gejala_history as $data) {						
						echo '
							<p>'.$no.'. '.$data->nama_gejala.'</p>
						';
						$no++;
					}
				?>
				<br>
				<h3>Penyakit :</h3>
				<?php
				if (is_array($gejala_penyakit_history) && $gejala_penyakit_history) { 

	            	$no = 1;
					foreach ($gejala_penyakit_history as $data) {						
						echo '
							<p><b>'.$no.'. '.$data->nama_penyakit.'</b></p>
							<p style="text-align:justify">'.$data->keterangan.'</p>
						';
						$no++;
					}
				} else {
					echo '
						<div class="section-title">
				        	<p>Tidak ada penyakit yang ditemukan</p>
					    </div>
					';
				}

					// $no = 1;
					// foreach ($gejala_penyakit_history as $data) {						
					// 	echo '
					// 		<p>'.$no.'. '.$data->nama_penyakit.'</p>
					// 		<p>'.$data->keterangan.'</p>
					// 	';
					// 	$no++;
					// }
				?>
				<?php if ($hitungan): ?>
					<table id="bootstrap-data-table-export" class="table table-bordered table-result">
						<tr>
							<th>PENYAKIT</th>
							<th>NILAI V</th>
						</tr>
						<?php foreach ($penyakit as $penyakit): ?>
							
							<tr>
								<td><?= $penyakit->nama_penyakit; ?></td>
								<td>
									<?= $hitungan[$penyakit->id_penyakit]; ?>	
								</td>
							</tr>
						<?php endforeach; ?>
					</table>
				<?php endif ;?>
				<h6 style="text-align: right;">Tanggal Konsultasi : <?php date_default_timezone_set("Asia/Bangkok");
						$tgl = date("d M Y", strtotime($det_history->tgl_konsultasi));
						echo $tgl; ?></h6>
			</div>
		</div>
	</div>
</section>
                                                                      




                                                                      <section class="portfolio-single-page section-sm">
  <div class="container">
    <div class="row">
      <div class="col-md-7">
        <div>
            <img class="img-responsive" src="<?php echo base_url(); ?>uploads/foto_profil/<?php echo $user->foto; ?>">
          </div>
      </div>
      <div class="col-md-5">
        <div class="project-details mt-50">
          <h4>Detail Anggota </h4>
          <ul>
            <li>
              <span><i class="fa fa-shield "></i> Nama</span>
              <span><strong> <?php echo $user->first_name;?> <?php echo $user->last_name;?></strong></span>
              <span><input type="" name=""></span>
            </li>
            <li><span><i class="fa fa-shirtsinbulk "></i> Nama Pengguna</span><strong> <?php echo $user->username;?></strong></li>
            <li><span><i class="fa fa-ils "></i> Email</span><strong> <?php echo $user->email;?></strong></li>
            <li><span><i class="icon-calendar3"></i>Telepon</span> <?php echo $user->phone;?></li>
            <br>
            <?php
              $id_user = $this->session->userdata('id_user');
              if ($user->id_user === $id_user) {
                echo '
                  <li><span><i class="icon-calendar3"></i>Ganti Foto</span> 
                    <form class="form-horizontal" method="post" id="form-pendaftaran" enctype="multipart/form-data" action="'.base_url().'profile/ganti_foto">
                      <input type="file" name="foto" value="" required>
                      <br><p style="font-size: 8pt;">*maskimal ukuran 5 MB</p>
                      <input class="btn btn-bg" type="submit" name="submit" value="GANTI">
                    </form>
                  </li>
                ';
              }
            ?>
          </ul>
        </div>
      </div>
    </div>
</section>


<form class="form-horizontal" method="post" id="form-pendaftaran" enctype="multipart/form-data" action="'.base_url().'profile/ganti_foto">
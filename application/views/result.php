<section class="about-feature bg-light section dark-service">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="title">
					<h2 class="h1">HASIL CEK KONSULTASI</h2>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
		        <div class="post-content post-excerpt row result-bg"">
		        <br>
		          	<div class="col-md-12">
		          		<div class="col-md-6 col-sm-12 col-xs-12">
			          		<div class="col-md-4 col-sm-3 col-xs-5">
								<p>Nama</p>
								<p>Nama Pengguna</p>
								<p>Email</p>
							</div>
							<div class="col-md-8 col-sm-9 col-xs-7">
								<p>: <?= $det_konsul->first_name;?> <?= $det_konsul->last_name;?></p>
								<p>: <?= $det_konsul->username ?></p>
								<p>: <?= $det_konsul->email ?></p>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<div class="col-md-4 col-sm-3 col-xs-5">
								<p>Nama Kucing </p>
								<p>Umur </p>
								<p>Jenis Kelammin </p>
							</div>
							<div class="col-md-8 col-sm-9 col-xs-7">
								<p>: <?= $det_konsul->nama_kucing?></p>
								<p>: <?php 
								$lahir = $det_konsul->tgl_lahir;
						        $biday = new DateTime($lahir);
						        $today = new DateTime();
						        $diff = $today->diff($biday);
								echo ''.$diff->y.' tahun '.$diff->m.' bulan '.$diff->d.' hari ';
								?>
								</p>
								<p>: <?= $det_konsul->jenis_kelamin ?> </p>
							</div>
						</div>
					</div>
					<div class="col-md-12">
						<h4>GEJALA : </h4>
						<?php
							$no = 1;
							foreach ($gejala_history as $data) {						
								echo '
									<p>'.$no.'. '.$data->nama_gejala.'</p>
								';
								$no++;
							}
						?>
					</div>
					<div class="col-md-12">
						<h4>HASIL DIAGNOSA : </h4>
						<?php if ($hitungan): ?>
							<table id="bootstrap-data-table-export" class="table table-bordered table-result">
								<tr>
									<th>Penyakit</th>
									<th>Nilai Perhitungan Kemungkinan Penyakit yang Muncul</th>
								</tr>
								<?php
								foreach ($penyakit as $p): ?>
									<tr>
										<td><?= $p->nama_penyakit; ?></td>
										<td><?= $hitungan[$p->id_penyakit]; ?></td>
									</tr>
								<?php endforeach; ?>
							</table>
						<?php endif; ?>
						<br>
					</div>
					<br>
					<div class="col-md-12">
						<h4>PENYAKIT : </h4>
						<?php
						$tempHitungan = [];
						foreach ($hitungan as $key => $value) {
							$tempHitungan[$key] = $value;
						}
						arsort($tempHitungan);
						$temp = 0; $hasil = [];
						foreach ($tempHitungan as $key => $value) {
							if ($temp > $value) {
								break;
							}
							$temp = $value;
							$hasil[] = $key;
						}
						// if (is_array($gejala_penyakit_history) && $gejala_penyakit_history) {
						if (is_array($hasil) && $hasil) {
			            	$no = 1;
							// foreach ($gejala_penyakit_history as $data) {
							foreach ($penyakit as $p) {
								foreach ($hasil as $data) {
									if ($data == $p->id_penyakit) {
										echo '
											<p><b>'.$no++.'. '.$p->nama_penyakit.'</b></p>
											<p style="text-align:justify">'.$p->keterangan.'</p>
										';
									}
								}
							}
							echo '<h5><br><b>Untuk tindak lanjut silahkan menghubungi dokter:</b></h5>
						            <p>Kitty White - 0821 0022 1122<br>Jl. Sucipto, Kemanan, Kemiri, Probolinggo. </p>';
						} else {
							echo '
								<div class="">
								<br>
						        	<p>Penyakit yang diderita kucing anda bukan termasuk :
						        	';
	                                    $no = 1;
	                                    foreach ($penyakit as $data) {
	                                    echo '
	                                    	<p>'.$no.'. '.$data->nama_penyakit.'</p>
	                                    ';
	                                    $no++;
	                                    }
						        	echo '
						        	</p>
						        	<br>
						            <h5><b>Silahkan menghubungi dokter:</b></h5>
						            <p>Kitty White - 0821 0022 1122<br>Jl. Sucipto, Kemanan, Kemiri, Probolinggo. </p>
							    </div>
							';
						}
						?>
						<pre id="printPageButton">
						    "{
						    Perhaps it is because cats do not live by human patterns, 
						    do not fit themselves into prescribed behavior, 
						    that they are so united to creative people.
						    }"
						    - Andre Norton
						</pre>
					</div>
				</div>
				<button id="printPageButton" class="btn btn-md btn-bg" onClick="window.print();">CETAK</button>
			</div>
		</div>
	</div>
</section>
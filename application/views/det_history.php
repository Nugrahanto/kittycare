<section class="page-wrapper bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h2>KITTY CARE</h2>
				<p>Membantu mendiagnosa penyakit kucing 
dan menghubungkan anda dengan dokter hewan di KittyCare Serenity Probolinggo.</p>
                <br>
				<p><b>Drh. Kitty White</b></p>
				<address>
				KittyCare Serenity <br>
				Jl. Sucipto, Kemanan, Kemiri, Probolinggo. 
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
				<h6 style="text-align: right;">Tanggal Konsultasi : <?php date_default_timezone_set("Asia/Bangkok");
						$tgl = date("d M Y", strtotime($det_history->tgl_konsultasi));
						echo $tgl; ?></h6>
			</div>
		</div>
	</div>
</section>

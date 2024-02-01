<section class="service-list section bg-gray">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section-title text-center">
					<h2>Jejak Konsultasi Peliharaan</h2>
				</div>
			</div>
		</div>
		<div class="row">

		<?php

		if (is_array($history) && !empty($history)) { 

			foreach ($history as $data) {
				date_default_timezone_set("Asia/Bangkok");
				$tgl = date("d-m-Y", strtotime($data->tgl_konsultasi));
				$upper = strtoupper($data->nama_kucing);
				$lahir = $data->tgl_lahir;
		        $biday = new DateTime($lahir);
		        $today = new DateTime();
		        $diff = $today->diff($biday);
			echo '
					<div class="col-md-4 col-sm-6">
						<div class="block">
							<h2><u>'.$upper.'</u> <a href="'.base_url().'consultation/detail_history?'.md5('id_history').'='.$data->id_history.'"><i class="fa fa-stethoscope" style="font-size:20pt;color:#655E7A;padding:5px;"></i></a></h2>
							<h6>'.$tgl.'</h6>
							<h5>'.$diff->y.' tahun '.$diff->m.' bulan '.$diff->d.' hari </h5>
						</div>
					</div>
				
			';
			}
        } else {
        	echo '
					<div class="section-title text-center">
			        	<h3>Tidak Ada Jejak Konsultasi</h3>
				    </div>
				';
        }
		?>
		</div>
	</div>
	<div class="text-center">
			<!--Menampilkan Halaman -->
			<?php echo $pagination; ?>
			<!-- <ul class="pagination post-pagination">
				<li><a href="#">Prev</a>
				</li>
				<li class="active"><a href="#">1</a>
				</li>
				<li><a href="#">2</a>
				</li>
				<li><a href="#">3</a>
				</li>
				<li><a href="#">4</a>
				</li>
				<li><a href="#">5</a>
				</li>
				<li><a href="#">Next</a>
				</li>
			</ul> -->
		</div>
</section>
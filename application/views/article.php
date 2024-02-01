<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Artikel.</h1>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam.</p>-->
        </div>
      </div>
    </div>
  </div>
</section>


<div class="page-wrapper">
	<div class="container">
		<div class="row">

		<?php 
            foreach($article as $data){
            	$get = $data->desc_article;

               	echo '
		      		<div class="col-md-6 animated fadeInUp">
				        <div class="post">
				          <div class="post-thumb">
				            <a href="'.base_url().'article/detail/'.$data->id_article.'">
				              <img class="img-responsive" src="'.base_url().'uploads/article/'.$data->picture_article.'" alt="">
				            </a>
				          </div>
				          <h3 class="post-title"><a href="'.base_url().'article/detail/'.$data->id_article.'">'.$data->title_article.'</a></h3>
				          <div class="post-meta">
				          	<ul>
				          	  <li>
				                  <i class="ion-android-people"></i> DIBUAT OLEH ADMIN
				              </li>
				              </li>
				                  Tanggal ';
        				            $tgl = date("d M Y", strtotime($data->date_post));
        							echo $tgl;
                                    echo '
				              </li>
				          	</ul>
				          </div>
				          <div class="post-content">
				            <p>'.substr($get, 0, 450) .((strlen($get) > 450) ? '...' : '').'</p>
				            <a href="'.base_url().'article/detail/'.$data->id_article.'" class="btn btn-main">Lihat Selengkapnya</a>
				          </div>
						</div>
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
  </div>
</div>
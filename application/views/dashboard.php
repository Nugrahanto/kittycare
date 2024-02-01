
<!-- Slider Start -->
<section class="slider">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block">
					<h1 class="animated fadeInUp">KITTY CARE</h1>
					<p class="animated fadeInUp">Website ini merupakan website untuk membantu mendiagnosa penyakit kucing <br>dan menghubungkan anda dengan dokter hewan di KittyCare Serenity Probolinggo</p>
					<a href="<?php echo base_url(); ?>" class="btn btn-main animated fadeInUp" >SELAMAT DATANG</a>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Wrapper Start -->
<section class="about section">
	<div class="container">
		<div class="row">
			<div class="col-md-7 col-sm-12">
				<div class="block">
					<div class="section-title">
					<br>
					<br>
					<br>
						<h2>Kitty White</h2>
						<p>Lulusan Universitas Nusantara<br><i class="ion-social-instagram-outline"></i> kittycare_serenity | 0821 0022 1122</p>
					</div>
					<p>KittyCare Serenity<br>Jl. Sucipto, Kemanan, Kemiri, Probolinggo. </p>
				</div>
			</div><!-- .col-md-7 close -->
			<div class="col-md-5 col-sm-12">
				<div class="block">
					<img src="<?php echo base_url(); ?>assets/images/profil_petshop.jpeg" alt="Img">
				</div>
			</div><!-- .col-md-5 close -->
		</div>
	</div>
</section>

<!-- Service Start -->
<section class="service">
  <div class="container">
    <div class="row">
      <div class="section-title">
        <h2>BACA ARTIKEL</h2>
        <!--<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, <br> there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics</p>-->
      </div>
    </div>
    <div class="row ">
    	
		<?php 
            foreach($home_article as $data){
            	$get = $data->desc_article;

               	echo '
		      		<div class="col-md-6 ">
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
				                  <i class="ion-android-people"></i> CREATED BY ADMIN
				              </li>
				          	</ul>
				          </div>
				          <div class="post-content">
				            <p>'.substr($get, 0, 450) .((strlen($get) > 450) ? '...' : '').'</p>
				            <a href="'.base_url().'article/detail/'.$data->id_article.'" class="btn btn-main">Read More</a>
				          </div>
						</div>
		        	</div>
	        	';
            }
        ?>  		  		
	
    </div>
  </div>
</section>
<!-- Call to action Start -->
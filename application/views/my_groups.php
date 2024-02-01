<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Forum Saya.</h1>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, ex!</p>-->
        </div>
      </div>
    </div>
  </div>
</section>


<section class="pricing-table section bg-gray">
	<div class="container">
		<div class="row">
			<!-- single pricing table -->

			<?php 
			if (is_array($my_group) && !empty($my_group)) { 

            	foreach($my_group as $data){
               		echo '

						<div class="col-md-4 col-sm-6 col-xs-12" >
							<div class="pricing-item text-center">
								
								<!-- plan name & value -->
								<div class="price-title">
									<h3>'.$data->name.'</h3>
									<img class="img-responsive" src="'.base_url().'assets/images/blog/blog-post-1.jpg" alt="">
								</div>
								<!-- /plan name & value -->								
								<!-- Contact Us button -->
								<a class="btn btn-small" href="'.base_url().'groups/detail/'.$data->id_group.'">Lihat Selengkapnya</a>
								<!-- /Contact Us button -->
								
							</div>
						</div>
					';
				}
			} else {
				echo '
					<div class="section-title text-center">
			        	<h3>Cari dan Gabung Forum</h3>
			        	<br>
			        	<a href="'.base_url().'groups" class="btn btn-main animated fadeInUp" >Lihat Forum</a>
				    </div>
				';
			}

			?>


			<!-- end single pricing table -->
			
		</div>       <!-- End row -->
	</div>   	<!-- End container -->
</section>   <!-- End section -->
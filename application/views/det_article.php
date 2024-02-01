<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Detail Artikel.</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="post">
					<div class="post-media post-thum">
						<a href="">
							<img src="<?php echo base_url(); ?>uploads/article/<?php echo $det_article->picture_article?>" alt="">
						</a>
					</div>
					<h3 class="post-title"><a href=""><?php echo $det_article->title_article;?></a></h3>
					<div class="post-meta">
				        <ul>
				          <li>
				            <i class="ion-android-people"></i> DIBUAT OLEH ADMIN
				          </li>
				          <li>
				            Tanggal 
				            <?php 
				            $tgl = date("d M Y", strtotime($det_article->date_post));
							echo $tgl;
							?>
				          </li>
				        </ul>
				    </div>
					<div class="post-content">
						<p><?php echo $det_article->desc_article;?></p>
					</div>
				</div>
      		</div>

      		<div class="col-md-4">
      		</div>
		</div>
	</div>
</div>
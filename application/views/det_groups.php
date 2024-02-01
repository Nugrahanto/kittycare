<section class="page-title bg-2">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block">
          <h1>Detail Forum.</h1>
          <!--<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi, quibusdam.</p>-->
          		<?php
                    if (!empty($notif)) {
                        echo '<div class="alert alert-success">'.$notif.'</div>';
                    }
                ?>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
<div class="post">
	<div class="post-media post-thumb">
		<a href="">
			<img src="<?php echo base_url(); ?>assets/images/blog/blog-post-1.jpg" alt="">
		</a>
	</div>
	<h3 class="post-title"><a href=""><?php echo $det_group->name;?></a></h3>
	<div class="post-meta">
        <ul>
          <li>
            <i class="ion-android-people"></i> DIBUAT OLEH ADMIN
          </li>
          <li>
          	<form action="../join/<?php echo ''.$det_group->id_group.''; ?>" method="post">
          		<?php 
          		$id_group = $det_group->id_group;
          		$id_user = $this->session->userdata('id_user');
          		$null = $this->db->where('id_group', $id_group)
								 ->where('id_user', $id_user)
								 ->count_all_results('user_groups');
	          		if ($null == 0) {
	          			echo '<input type="submit" name="submit" value="Gabung" class="btn btn-join">';
	          		} else {
	          			echo '<input type="submit" name="unjoin" value="Keluar" class="btn btn-danger">';
	          		}
          			
          		?>
          	</form>
          </li>
          
        </ul>
    </div>
	<div class="post-content">
		<p><?php echo $det_group->description;?></p>
	</div>
					<div class="post-comments">
				    	<h3 class="post-sub-heading"><?php 
				    		$id_group =  $det_group->id_group;
				    		echo $this->db->where('id_group', $id_group)->count_all_results('comment') ?> Comments</h3>
				    	<ul class="media-list comments-list m-bot-50 clearlist">

						    <!-- Comment Item start-->
						    <?php echo $comments ?>
						    <!-- Comment Item start-->
						   
						</ul>
				    </div>
				    <div class="post-comments-form">
				    	<h3 class="post-sub-heading">Leave You Comments</h3>
				    	<form method="post" action="<?php echo base_url(); ?>groups/add_comment/<?php echo ''.$det_group->id_group.''; ?>" id="form" role="form" >

				            <div class="row">

				                <!-- Comment -->
				                <div class="form-group col-md-12">
				                    <textarea name="comment_body" id="text" class=" form-control" rows="6" placeholder="Comment" required></textarea>
				                </div>

				                <input type='hidden' name='comment_parent' value="0" id='parent_id'/>
                    			<input type='hidden' name='id_group' value="<?= $det_group->id_group ?>"/>
				                <!-- Send Button -->
				                <?php 
				          		$id_group = $det_group->id_group;
				          		$id_user = $this->session->userdata('id_user');
				          		$null = $this->db->where('id_group', $id_group)
												 ->where('id_user', $id_user)
												 ->count_all_results('user_groups');
					          		if ($null == 0) {
					          			echo '<div class="form-group col-md-12">
							                    <input class="btn btn-main btn-md" value="Silahkan Gabung" disabled>
							                  </div>';
					          		} else {
					          			echo '<div class="form-group col-md-12">
							                    <input type="submit" name="submit" class="btn btn-main" value="Kirim Komentar">
							                  </div>';
					          		}
				          			
				          		?>
				                


				            </div>

				        </form>
				    </div>

			</div>
      		</div>

      		<div class="col-md-4">
			<aside class="sidebar">
<!-- Widget Category -->

	<?php
		$id_group = $det_group->id_group;
        $id_user = $this->session->userdata('id_user');
        $null = $this->db->where('id_group', $id_group)
						 ->where('id_user', $id_user)
						 ->count_all_results('user_groups');
		if ($null !== 0) {
			echo '
				<div class="widget widget-category">
					<h4 class="widget-title">Anggota</h4>

					<ul class="widget-category-list">
					';
					$no = 1;
			foreach($mbr_group as $data){
			echo '
				        <li>
				        	<a href="'. base_url().'profile/user?'.md5('id_user').'='.$data->id_user.'">'.$no.'. '.$data->first_name.' '.$data->last_name.'</a>
				        </li>
				        ';
				$no++;
			} echo '
				    </ul>
				</div>
				';			
		}
	?>
	<!-- End category  -->

	<!-- Widget Latest Posts -->
	<div class="widget widget-latest-post">
		<h4 class="widget-title">Forum Lainnya</h4>

		<?php 
            foreach($oth_group as $data){
            	$get = $data->description;
            	$desc = substr($get, 0, 500);

               	echo '
					<div class="media">
						<a class="pull-left" href="'.base_url().'groups/detail/'.$data->id_group.'">
							<img class="media-object" src="'.base_url().'assets/images/blog/post-thumb.jpg" alt="Image">
						</a>
						<div class="media-body">
							<h4 class="media-heading"><a href="'.base_url().'groups/detail/'.$data->id_group.'">'.$data->name.'</a></h4>
							<p>'.substr($get, 0, 70) .((strlen($get) > 70) ? '' : '').'</p>
						</div>
					</div>
				';
			}
		?>


	</div>
	<!-- End Latest Posts -->

</aside>
      		</div>
		</div>
	</div>
</div>

<script type='text/javascript'>
        function prepareComment(id) {
            console.log('id');
            $("#parent_id").val(id);
            $("#text").focus();
        }
</script>